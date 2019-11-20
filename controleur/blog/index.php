<?php
//Controleur de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
	//---------------------------------------------------------------//

	//Code php:
	//---------------------------------------------------------------//
		//Importation du modèle (modele):
		//---------------------------------------------------------------//
			include_once('modele/blog/get_billets.php');
		//---------------------------------------------------------------//

		//Traitement sur les données (contrôleur):
		//---------------------------------------------------------------//
			//Variables:
			//---------------------------------------------------------------//
				$first_billet = 0;
			//---------------------------------------------------------------//

			//Gestion de la sécuritée:
			//---------------------------------------------------------------//
				//Gestion des ereurs de session:
				//---------------------------------------------------------------//
					//1-Première partie:
					//---------------------------------------------------------------//
						if(!isset($_SESSION['blog_part']))
						{
							$_SESSION['blog_part'] = 'billets';
							$_SESSION['page_index'] = 1;	
						}//Si la partie du blogue n'est pas précisée, la partie par défaut est l'affichage des billets et le numéro de billet devient 1 par défaut
						
						elseif(isset(($_SESSION['blog_part'])))
						{
							if(!isset($_SESSION['billet_id']))
							{
								$_SESSION['billet_id'] = 1;
							}//Si le numéro de billet en commentaire n'est pas précisé, il devient 1 par défaut
						}//Sinon si la la partie du blog est précisé on sécurise seulement le numéro de billet

						if(!isset($_SESSION['page_index']))
						{
							$_SESSION['page_index'] = 1;
						}//Si la sous page d'index n'est pas précisée, la sous page par défaut est 1
					//---------------------------------------------------------------//

					//2-Deuxième partie:
					//---------------------------------------------------------------//	
						if($_SESSION['blog_part'] == 'billets' AND isset($_SESSION['page_index']))	//Si la partie du blog est l'affichage des billets
						{
							$nbre_billet_page = 4;//On définit le nombre de billet maximal par page
							$nbre_billet = get_nbre_results();//On recupère le nombre de billet
							$nbre_page = cal_nbre_page($nbre_billet, $nbre_billet_page);//On calcule le nombre de page en fonction du nombre de billet contenu dans la base de données
							$first_billet = (($_SESSION['page_index']-1)*($nbre_billet_page));//On calcule le premier billet
							$billets = get_billets($first_billet, $nbre_billet_page);//On recupère les billets
						}//On paramètre le remplissage avec plusieurs billets

						elseif($_SESSION['blog_part'] == 'commentaires' AND isset($_SESSION['billet_id']))	//Si la partie du blog est l'affichage des commentaires
						{
							$nbre_billet_page = 1;
							$nbre_billet = 1;
							$nbre_page = 1;	
							$first_billet = $_SESSION['billet_id'];

							//Calcul du offset_commentaire:
							//---------------------------------------------------------------//
								if(get_nbre_commentaires()>20)
								{
									$offset_commentaire = (get_nbre_commentaires())-20;	
								}
								else
								{
									$offset_commentaire = 0;
								}
							//---------------------------------------------------------------//
							$billet = get_billet($first_billet);//On recupère les billets
							$commentaires = get_commentaires($offset_commentaire, 20, $_SESSION['billet_id']);//On récupère les commentaires relatifs au billet
						}//On paramètre le remplissage avec un seul billet
					//---------------------------------------------------------------//
				//---------------------------------------------------------------//

				//Sécurisation: 
				//---------------------------------------------------------------//
				// $billets = [];
				if (isset($billets))
				{
					foreach ($billets as $cle => $billet)
					{
						$billets[$cle]['pseudo'] = htmlspecialchars($billet['titre']);
						$billets[$cle]['message'] = ($billet['contenu']);
					}
				}
				//---------------------------------------------------------------//
			//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		$_SESSION['post_section']='index';
		//Affichage de la page (vue):
		//---------------------------------------------------------------//
			include_once('vue/blog/index.php');
		//---------------------------------------------------------------//
		
	//---------------------------------------------------------------//
//---------------------------------------------------------------/*/