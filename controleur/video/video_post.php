<?php
//Controleur de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
		session_start();		//Lance la session
	//---------------------------------------------------------------//

	//Code php:
	//---------------------------------------------------------------//
		if(isset($_POST['shearch_video']))
		{
			$_SESSION['shearch_video'] = $_POST['shearch_video'];
			$_SESSION['page_video'] = 1;
		}
		if(isset($_GET['page_video']))
		{
			$_SESSION['page_video'] = $_GET['page_video'];
		}
		header('Location: ../../');	//Retour vers la page index
	//---------------------------------------------------------------//
//---------------------------------------------------------------//
