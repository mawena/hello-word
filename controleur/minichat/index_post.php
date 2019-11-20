<?php
//Controleur de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page:
	//---------------------------------------------------------------// 		
		session_start();	//Lancement de la session
		include_once('../../modele/minichat/get_messages.php');
		include_once('../../modele/connexion_sql.php');
	//---------------------------------------------------------------//
	//Code php:
	//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		if(isset($_POST['instruction']))
		{
			if($_POST['instruction'] == 'add_message')
			{
				if(isset($_POST['pseudo']) AND isset($_POST['message']))
				{
					add_message($_POST['pseudo'], $_POST['message']);
				}
			}
		}
		//---------------------------------------------------------------/*/	
		//---------------------------------------------------------------//	
		if(isset($_GET['instruction']))
		{
			if($_GET['instruction'] == 'dell' AND isset($_GET['message_id']))
			{
				dell_message($_GET['message_id']);
			}
			elseif($_GET['instruction'] == 'dell_all')
			{
				dell_all_messages();
			}
			if($_GET['instruction'] == 'pager' AND isset($_GET['page_minichat']))
			{
				$_SESSION['page_minichat'] = $_GET['page_minichat'];
			}
		}
		//---------------------------------------------------------------//	
		header('Location: ../../');	//Retour vers la page controleur
	//---------------------------------------------------------------//
//---------------------------------------------------------------//
