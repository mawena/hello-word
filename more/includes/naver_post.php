<?php
//Controleur de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
		session_start();		//Lance la session
	//---------------------------------------------------------------//

	//Code php:
	//---------------------------------------------------------------//
		if(isset($_GET['section']))
		{
			$_SESSION['section'] = $_GET['section'];
		}
		header('Location: ../../');	//Retour vers la page controleur
	//---------------------------------------------------------------//
//---------------------------------------------------------------//