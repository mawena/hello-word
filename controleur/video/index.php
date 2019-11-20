<?php
//Controleur de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
	//---------------------------------------------------------------//

	//Code php:
	//---------------------------------------------------------------//
		//Importations:
		//---------------------------------------------------------------//
			include_once('modele/video/get_videos.php');
		//---------------------------------------------------------------//
		if (isset($_SESSION['shearch_video']) AND !empty($_SESSION['shearch_video']))
		{
			//Variables:
			//---------------------------------------------------------------//
				$regex = '\''.$_SESSION['shearch_video'].'\''; //Contient le regex
				$nbre_results = get_nbre_results($regex);	//Contient le nombre de résultats
				$nbre_results_page = 3;	//Variable contenant le nombre de vidéos par page
				$first_video = 0; 	//Variable contenant le numéro de la première video à afficher	
				$nbre_page = cal_nbre_page($nbre_results, $nbre_results_page);	//Contient le nombre de sous page
			//---------------------------------------------------------------//

				
			//Demande des videos (modèle):
			//---------------------------------------------------------------//
				if (!isset($_SESSION['page_video']))
					{
						$_SESSION['page_video'] = 1;
					}

				if(isset($_SESSION['page_video']))
				{
					$first_video = (($_SESSION['page_video']-1)*($nbre_results_page));
					$videos = get_videos($first_video, $nbre_results_page, $regex);
				}
			//---------------------------------------------------------------//

			//Traitement sur les données (contrôleur):
			//---------------------------------------------------------------//

			//---------------------------------------------------------------//
		}
		$_SESSION['post_section']='video';
		//Affichage de la page (vue):
		//---------------------------------------------------------------//
			include_once('vue/video/index.php');
		//---------------------------------------------------------------//
		
	//---------------------------------------------------------------//
//---------------------------------------------------------------//
