		<section>
		<h1>Mon super blog 2.0</h1>
		<?php
			if(isset($_SESSION['identifiant']))
			{
				echo "<h3>Voici nôtre page d'aceuil Mr.".$_SESSION['identifiant']."</h3>";
			}
			else
			{
				echo "<p class=\"red-color\">Vous êtes déconnecté.<br/><a class=\"red_color center\" href=\"./controleur/connexion/index_post.php?action=connecte_moi\">Se connecter</a></p>";
			}
			//Billets_page:
			//---------------------------------------------------------------//
				if($_SESSION['blog_part'] == 'billets' AND isset($_SESSION['page_index']))	//Si la partie du blog est l'affichage des billets
				{
					//Affichage des billets:
					//---------------------------------------------------------------//
						echo '<h4>Derniers billets du blog:</h4>';
						foreach ($billets as $billet)
						{
							echo'
								<aside class="news">		
									<h3>'.$billet['titre'].'<em>le '.$billet['date_creation_fr'].'</em></h3>				
									<p>
										'.$billet['contenu'].'
										<br />
										<em><a href="controleur/blog/index_post.php?blog_part=commentaires&billet_id='.$billet['id'].'">Commentaires</a></em>
									</p>
								</aside>
							';	
						}
					//---------------------------------------------------------------//

					//Affichage du menu des navigation entre les sous pages
					//---------------------------------------------------------------//		
						menu_navigation($nbre_page, 'controleur/blog/index_post.php?page_index=', $_SESSION['page_index']);
					//---------------------------------------------------------------//
				}
			//---------------------------------------------------------------//

			//Commentaires_page:
			//---------------------------------------------------------------//
				elseif($_SESSION['blog_part'] == 'commentaires' AND isset($_SESSION['billet_id']))	//Si la partie du blog est l'affichage des commentaires
				{
					echo '<a href="controleur/blog/index_post.php?blog_part=billets"><h1>RETOUR AUX BILLETS</h1></a>';
					//Affichage du billet:
					//---------------------------------------------------------------//
							echo'
								<aside class="news">		
									<h3>'.$billet['titre'].'<em>le '.$billet['date_creation_fr'].'</em></h3>				
									<p>
										'.$billet['contenu'].'		
									</p>
								</aside>
							';	
					//---------------------------------------------------------------//

					//Affichage des commentaires:
						echo '
							<h3>Commentaires</h3>
							<div class="new"><p>';
							foreach ($commentaires as $commentaire)
							{
								echo '<br/><strong>'.$commentaire['auteur'].'</strong>'.$commentaire['date_creation_fr'].':<br/>'.$commentaire['commentaire'].'<br/>';
							}
						echo '</p></div>';


					//Affichage de la barre d'ajout de commentaires:
						echo '<h3>Ajouter des commentaires</h3><br/>
							<form method="post" action="controleur/blog/index_post.php">
							<label for="pseudo">Pseudo : </label><input type="test" name="pseudo" id="pseudo" value="'.$_SESSION['identifiant'].'"><br/><br/>
							<label for="commentaire">Commentaires : </label><input type="test" name="commentaire" id="commentaire"><br/><br/>
							<input type="hidden" name="id_billet" value="'.$_SESSION['billet_id'].'">
							<input type="hidden" name="instruction" value="add_commentaire"/>
							<input type="submit" value="envoyer">
							</form>
						<h3>Ajouter des commentaires</h3><br/>';
						;
				}
			//---------------------------------------------------------------//


		?>
		