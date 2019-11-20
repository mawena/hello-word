<section>
<h1>Minichat</h1>
	<?php
		if(isset($_SESSION['identifiant']))		//Si on est connecté
		{
		//Affichage des barres d'entrées:
		//---------------------------------------------------------------//
			echo '
			<div class="center">
				<form method="post" action="controleur/minichat/index_post.php">
					<input type="hidden" name="instruction" id="pseudo" value="add_message">
					';
			echo ($_SESSION['Fonction'] == 'Admin') ? '<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo" value="'.$_SESSION['identifiant'].'"><br/> ' : '<input type="hidden" name="pseudo" id="pseudo" value="'.$_SESSION['identifiant'].'">';
			echo '
					<label for="message">Message : </label><input type="text" name="message" id="message"/><br/>
					<input type="submit" value="envoyer">
				</form>
			</div>	';
		//---------------------------------------------------------------//

		//Affichage des messages:
		//---------------------------------------------------------------//
			foreach($messages as $message)
			{
				echo '<aside class="news">
						<h3>('.$message['date_creation_fr'].')</h3>
						<p>
						<strong>'.$message['pseudo'].'</strong> : '.$message['message'];
				
				echo ($_SESSION['Fonction'] == 'Admin') ? '.<a href="controleur/minichat/index_post.php?instruction=dell&message_id='.$message['id'].'">Suprimer</a>' : NULL;
				echo '</p>
					 </aside>';
			}
		//---------------------------------------------------------------//
		}
		else
		{
			echo "<p class=\"red-color\">Vous êtes déconnecté.<br/><a class=\"red_color center\" href=\"./controleur/connexion/index_post.php?action=connecte_moi\">Se connecter</a></p>";
		}
	?>
</section>