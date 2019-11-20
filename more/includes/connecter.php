<nav class="statut">
	<?php
		if (isset($_SESSION['identifiant']))
		{
			echo '<a href="./controleur/connexion/index_post.php?action=deconnecte_moi">Deconnexion</a>';
		}
		else
		{
			echo '<a href="./more/includes/naver_post.php?section=connexion">Connexion</a>';
		}
	?>
	<div class="animation start-home"></div>
</nav>