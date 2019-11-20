<?php

//Modèle de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 
		include_once('./modele/connexion_sql.php');
		include_once('./more/classes/Membre.class.php');
	//---------------------------------------------------------------//

	//Code php:
	//---------------------------------------------------------------//
		//Fonction de vérification d'Identifiant
		//---------------------------------------------------------------//
			function Identifiant_isset($Identifiant)
			{
				//Connexion à la base de donnée:
				//---------------------------------------------------------------//
					$bdd = bdd_connect();
				//---------------------------------------------------------------//

				//requetage:
				//---------------------------------------------------------------//					
					$req = $bdd->prepare('SELECT * FROM Membres WHERE Identifiant = :iden');
					$req->execute(array('iden' => $Identifiant));
					#On effectue une recherche
					$membre_tab_all = $req->fetchAll();			#On rassemble les résultats dans une variable
					$req->closeCursor();						#On ferme la requête
				//---------------------------------------------------------------//

				//Traitements des données:
				//---------------------------------------------------------------//
					foreach ($membre_tab_all as $m) 
					{
						$membre_tab=$m; 					#On stocke le bon membre dans une variable
					}

					if (!empty($membre_tab))				#Si on trouve un resultat
					{
						return true;
					}
					else
					{
						return false;
					}
				//---------------------------------------------------------------//

			}
		//---------------------------------------------------------------//

		//Fonction de connexion:
		//---------------------------------------------------------------//
			function connexion_membre($Identifiant,$Password)
			{

					//Connexion à la base de donnée:
					//---------------------------------------------------------------//
						$bdd = bdd_connect();
					//---------------------------------------------------------------//
			
					//requetage:
					//---------------------------------------------------------------//
						
						$req = $bdd->prepare('SELECT * FROM Membres WHERE Identifiant = :iden AND Password = :pass');
						$req->execute(array('iden' => $Identifiant, 'pass' => $Password));
						#On effectue une recherche et une verification des informations de connexion
						$membre_tab_all = $req->fetchAll();			#On rassemble les résultats dans une variable
						$req->closeCursor();						#On ferme la requête
					//---------------------------------------------------------------//

					//Traitement des données:
					//---------------------------------------------------------------//
						foreach ($membre_tab_all as $m) {
							$membre_tab=$m; 					#On stocke le bon membre dans une variable
						}
						if(!empty($membre_tab))					#Si on trouver une ocurance
						{
							$membre = new Membre($membre_tab["ID"],$membre_tab["Identifiant"],$membre_tab["Nom"],$membre_tab["Prenoms"],$membre_tab["Date_de_naissance"],$membre_tab["Date_d_hadesion"],$membre_tab["Tel"],$membre_tab["Password"],$membre_tab["Fonction"],$membre_tab["Adresse_mail"],$membre_tab["Sexe"],$membre_tab["Signature"]);
							//On créer le membre à l'aide des informations suplémentaires de la base de données
							return $membre;						#On retourne le membre
							
						}
						else 					#Sinon (c'est à dire qu'on n'as trouvé aucune corespondance)
						{
							return false;
						}					
			}
		//---------------------------------------------------------------//

		//Fonction d'inscription:
		//---------------------------------------------------------------//
			function inscription_membre($Identifiant,$Nom,$Prenoms,$Date_de_naissance,$Tel,$Password,$Fonction,$Adresse_mail,$Sexe,$Signature)
			{
				//Connexion à la base de donnée:
				//---------------------------------------------------------------//
					$bdd = bdd_connect();
				//---------------------------------------------------------------//

				//requetage:
				//---------------------------------------------------------------//
					if(Identifiant_isset($Identifiant))
					{					
						echo "<p class=\"red-color\">L'Identifiant ".$Identifiant." existe déja!!!<br/>Veuillez en utiliser un autre pour votre inscription";
					}
					else
					{
						$req = $bdd->prepare('INSERT INTO Membres (Identifiant, Nom, Prenoms, Date_de_naissance, Date_d_hadesion, Tel, Password, Fonction, Adresse_mail, Sexe, Signature) VALUES(:Identifiant, :Nom, :Prenoms, :Date_de_naissance, NOW(), :Tel, :Password, :Fonction, :Adresse_mail, :Sexe, :Signature)');
						$req->execute(array('Identifiant' => $Identifiant, 'Nom' => $Nom, 'Prenoms' => $Prenoms, 'Date_de_naissance' => $Date_de_naissance, 'Tel' => $Tel, 'Password' => $Password, 'Fonction' => $Fonction, 'Adresse_mail' => $Adresse_mail, 'Sexe' => $Sexe, 'Signature' => $Signature));
						$req->closeCursor();
					}
				//---------------------------------------------------------------//
			}
		//---------------------------------------------------------------//
	//---------------------------------------------------------------//
//---------------------------------------------------------------//
?>