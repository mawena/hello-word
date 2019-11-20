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
		//Billets:
		//---------------------------------------------------------------//
			//Fonction get_nbre_results:
			//---------------------------------------------------------------//
				function get_nbre_results()
					{
						//Connexion à la base de donnée:
						//---------------------------------------------------------------//
							$bdd = bdd_connect();
						//---------------------------------------------------------------//

						//requetage:
						//---------------------------------------------------------------//
							$req = $bdd->query('SELECT COUNT(*) AS nb_billets FROM billets');
							$nombre_billets = $req->fetch();
							$req->closeCursor();
						//---------------------------------------------------------------//

							return $nombre_billets['nb_billets'];
					}
			//---------------------------------------------------------------//

			//Fonction get_billets:
			//---------------------------------------------------------------//
				function get_billets($offset, $limit)
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
						$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
						$req->bindParam(':offset', $offset, PDO::PARAM_INT);
						$req->bindParam(':limit', $limit, PDO::PARAM_INT);
						$req->execute();
						$billets = $req->fetchAll();
						$req->closeCursor();


						return $billets;
					//---------------------------------------------------------------//
				}
			//---------------------------------------------------------------//

			//Fonction get_billet:
			//---------------------------------------------------------------//
				function get_billet($id)
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
						$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets where id = :id ORDER BY date_creation DESC');
						$req->bindParam(':id', $id, PDO::PARAM_INT);
						$req->execute();
						$billet = $req->fetch();
						$req->closeCursor();
						return $billet;
					//---------------------------------------------------------------//
				}
			//---------------------------------------------------------------//
		//---------------------------------------------------------------//

		//Commentaires:
		//---------------------------------------------------------------//	
			//Fonction get_nbre_commentaires:
			//---------------------------------------------------------------//
				function get_nbre_commentaires()
					{
						//Connexion à la base de donnée:
						//---------------------------------------------------------------//
							$bdd = bdd_connect();
						//---------------------------------------------------------------//

						//requetage:
						//---------------------------------------------------------------//
							$req = $bdd->query('SELECT COUNT(*) AS nb_commmentaires FROM commentaires');
							$nombre_commentaires = $req->fetch();
							$req->closeCursor();
						//---------------------------------------------------------------//
							return empty($nombre_commentaires['nb_commentaires']) ? NULL : $nombre_commentaires['nb_commentaires'];
					}
			//---------------------------------------------------------------//

			//Fonction get_commentaires:
			//---------------------------------------------------------------//
				function get_commentaires($offset, $limit, $billet_id)
				{
					//Variables:
					//---------------------------------------------------------------//
						$offset = (int) $offset;
						$limit = (int) $limit;
						$billet_id = (int) $billet_id;
					//---------------------------------------------------------------//

					//Connexion à la base de donnée:
					//---------------------------------------------------------------//
						$bdd = bdd_connect();
					//---------------------------------------------------------------//

					//requetage:
					//---------------------------------------------------------------//
						$req = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM commentaires WHERE id_billet = :billet_id ORDER BY date_commentaire DESC LIMIT :offset, :limit');
						
						$req->bindParam(':billet_id', $billet_id, PDO::PARAM_INT);
						$req->bindParam(':offset', $offset, PDO::PARAM_INT);
						$req->bindParam(':limit', $limit, PDO::PARAM_INT);
						$req->execute();	

						$commentaires = $req->fetchAll();
						$req->closeCursor();

						return $commentaires;
					//---------------------------------------------------------------/*/
				}
			//---------------------------------------------------------------//

			//Fonction add_commentaire:
			//---------------------------------------------------------------//
				function add_commentaire($pseudo, $message, $billet_id)
				{
					//Connexion à la base de donnée:
					//---------------------------------------------------------------//
						$bdd = bdd_connect();
					//---------------------------------------------------------------//
					//requetage:
					//---------------------------------------------------------------//
						$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(:billet_id, :auteur, :commentaire, NOW())');
						$req->execute(array('billet_id' => $billet_id, 'auteur' => $pseudo, 'commentaire' => $message));
						$req->closeCursor();
					//---------------------------------------------------------------//
				}
			//---------------------------------------------------------------//
		//---------------------------------------------------------------//
	//---------------------------------------------------------------//
//---------------------------------------------------------------//
