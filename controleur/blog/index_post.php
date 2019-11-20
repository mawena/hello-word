<?php
//Controleur de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
		session_start();		//Lance la session
		include_once('../../modele/blog/get_billets.php');
		include_once('../../modele/connexion_sql.php');			//Importe les fonctions nécéssaires
	//---------------------------------------------------------------//

	//Code php:
	//---------------------------------------------------------------//
		//---------------------------------------------------------------//
			if(isset($_GET['page_index']))	//Si on précise la page_index
			{
				$_SESSION['page_index'] = $_GET['page_index'];
			}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//
			if(isset($_GET['blog_part']))	//Si la blog_part est précisée
			{
				$_SESSION['blog_part'] = $_GET['blog_part'];
			}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//
			if(isset($_GET['billet_id']))	//Si la billet_id est précisée
			{
				$_SESSION['billet_id'] = $_GET['billet_id'];
			}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//
			if(isset($_POST['instruction']))	//Si une instruction est envoyée
			{
				if($_POST['instruction'] == 'add_commentaire' AND isset($_POST['pseudo']) AND isset($_POST['commentaire']) AND isset($_POST['id_billet']))
				{
					add_commentaire($_POST['pseudo'], $_POST['commentaire'], $_POST['id_billet']);
					echo $_POST['id_billet'];
				}
			}
		//---------------------------------------------------------------/*/

		header('Location: ../../');	//Retour vers la page controleur
	//---------------------------------------------------------------//
//---------------------------------------------------------------//
