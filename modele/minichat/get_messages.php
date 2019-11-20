<?php
//Modèle de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
		empty($_SESSION) ? session_start() : NULL;
		include_once('modele/connexion_sql.php');
	//---------------------------------------------------------------//

	//Code php:
	//---------------------------------------------------------------//
		//Fonction get_messages:
		//---------------------------------------------------------------//
			function get_messages($offset, $limit)	//permet d'avoir une certaine une partie des messages contenus dans la base de donnée
			{
				//Variables:
				//---------------------------------------------------------------//
					$offset = (int) $offset;
					$limit = (int) $limit;
				//---------------------------------------------------------------//

				//Connexion à la base de donnée:
				//---------------------------------------------------------------//
					$bdd = bdd_connect();
				//---------------------------------------------------------------//

				//requetage:
				//---------------------------------------------------------------//
					$req = $bdd->prepare('SELECT id, pseudo, message, DATE_FORMAT(date_modif, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM minichat ORDER BY date_modif DESC LIMIT :offset, :limit');
					$req->bindParam(':offset', $offset, PDO::PARAM_INT);
					$req->bindParam(':limit', $limit, PDO::PARAM_INT);
					$req->execute();
					$messages = $req->fetchAll();


					return $messages;
				//---------------------------------------------------------------//
			}
		//---------------------------------------------------------------//

		//Fonction get_nbre_results:
		//---------------------------------------------------------------//
			function get_nbre_results()	//Permet de connaitre le nombre de messages contenu dans la base de donnée
			{
				//Connexion à la base de donnée:
				//---------------------------------------------------------------//
					$bdd = bdd_connect();
				//---------------------------------------------------------------//

				//requetage:
				//---------------------------------------------------------------//
					$req = $bdd->query('SELECT COUNT(*) AS nb_messages FROM minichat');
					$nombre_messages = $req->fetch();
				//---------------------------------------------------------------//

					return $nombre_messages['nb_messages'];
			}
		//---------------------------------------------------------------//

		//Fonction dell_messages:
		//---------------------------------------------------------------//
			function dell_message($id)
			{
				//Variables:
				//---------------------------------------------------------------//
					$id = (int) $id;
				//---------------------------------------------------------------//
				//Connexion à la base de donnée:
				//---------------------------------------------------------------//
					$bdd = bdd_connect();
				//---------------------------------------------------------------//

				//requetage:
				//---------------------------------------------------------------//
					$req = $bdd->prepare('DELETE FROM minichat WHERE ID = :identifiant');
					$req->bindParam(':identifiant', $id, PDO::PARAM_INT);
					$req->execute();
				//---------------------------------------------------------------//
			}
		//---------------------------------------------------------------//

		//Fonction dell_all_messages:
		//---------------------------------------------------------------//
			function dell_all_messages()
			{
				//Connexion à la base de donnée:
				//---------------------------------------------------------------//
					$bdd = bdd_connect();
				//---------------------------------------------------------------//

				//requetage:
				//---------------------------------------------------------------//
					$req = $bdd->exec('TRUNCATE TABLE minichat');
				//---------------------------------------------------------------//
			}
		//---------------------------------------------------------------//
		//Fonction add_message:
		//---------------------------------------------------------------//
			function add_message($pseudo, $message)
			{
				//Connexion à la base de donnée:
				//---------------------------------------------------------------//
					$bdd = bdd_connect();
				//---------------------------------------------------------------//
				//requetage:
				//---------------------------------------------------------------//
					$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_modif) VALUES(:pseudo, :message, NOW())');
					$req->execute(array('pseudo' => $pseudo, 'message' => $message));
					$req->closeCursor();
				//---------------------------------------------------------------//
			}
		//---------------------------------------------------------------//
	//---------------------------------------------------------------//
//---------------------------------------------------------------//