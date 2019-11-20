<?php
//Modèle de site:
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
		empty($_SESSION) ? session_start() : NULL;
		include_once('modele/connexion_sql.php');
	//---------------------------------------------------------------//

	//Code php:
	//---------------------------------------------------------------//
		//Fonction get_nbre_results:
		//---------------------------------------------------------------//
			function get_nbre_results($regex)
			{
				//Connexion à la base de donnée:
				//---------------------------------------------------------------//
					$bdd = bdd_connect();
				//---------------------------------------------------------------//

				//requetage:
				//---------------------------------------------------------------//
					$req = $bdd->prepare('SELECT * FROM videos WHERE nom REGEXP '.$regex.''); //On récupère les vidéos correspondantes
					$req->execute();
					$videos = $req->fetchAll();
					$compteur = 0;
					foreach ($videos as $test)
					{
						$compteur++;
					}
					return $compteur;
					$req->closeCursor();
			}
		//---------------------------------------------------------------//
			
		//Fonction get_videos:
		//---------------------------------------------------------------//
			function get_videos($offset, $limit, $regex)
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
					$req = $bdd->prepare('SELECT * FROM videos WHERE nom REGEXP '.$regex.' ORDER BY nom LIMIT :offset, :limit'); //On récupère les vidéos correspondantes
					
					$req->bindParam(':offset', $offset, PDO::PARAM_INT);
					$req->bindParam(':limit', $limit, PDO::PARAM_INT);
					$req->execute();
					$videos = $req->fetchAll();
					$req->closeCursor();

					return $videos;
				//---------------------------------------------------------------//

		}
	//---------------------------------------------------------------//
		
	//---------------------------------------------------------------//
//---------------------------------------------------------------/*/