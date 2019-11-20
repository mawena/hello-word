<section>
	<h1>Des videos</h1>
	<?php
		if(isset($_SESSION['identifiant']))	//si l'utilisateur est connecté
		//---------------------------------------------------------------//			
			{
				//Affichage de la barre de recherche:
				//---------------------------------------------------------------//
					echo '
					<div class="center">
					<form method="post" action="./controleur/video/video_post.php">
					<input type="name" name="shearch_video"/>
					<input type="submit" value="Rechercher" name="Rechercher"/>
					</form>
					</div>';
				//---------------------------------------------------------------/

				//Affichage des résultats:
				//---------------------------------------------------------------/
					if(isset($nbre_results))
					{
						echo '<p class="red-color"> '.$nbre_results.' résultats</p>';	//Affichage du nombre de résultat
					}

					if(isset($_SESSION['shearch_video']) AND !empty($_SESSION['shearch_video']))
					{
						foreach ($videos as $video)
						{
							vi1($video['nom'], 'Musique/'.$video['nom2'].'/'.$video['nom']);	//On affiche les vidéos trouvés
						}
					}
					else //Sinon si le regex n'est pas précisé ou est vide
					{
						echo (empty($_SESSION['shearch_video'])) ? "<p class=\"red-color\">Veuillez effectuer une recherche valide</p>" : NULL;
					}
				//Affichage du menu des navigation entre les sous pages
				//---------------------------------------------------------------//
					if(isset($nbre_page) AND isset($_SESSION['page_video']))
					{	
						menu_navigation($nbre_page, 'controleur/video/video_post.php?page_video=', $_SESSION['page_video']);	//On affiche un menu de navigation entre les vidéos si besoin
					}
				//---------------------------------------------------------------//
			}
			else
			{
				echo "<p class=\"red-color\">Vous êtes déconnecté.<br/><a class=\"red_color center\" href=\"./controleur/connexion/index_post.php?action=connecte_moi\">Se connecter</a></p>";
			}
		//---------------------------------------------------------------//
	?>
</section>
		