<?php
//Modèle de site
//---------------------------------------------------------------//
	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
	//---------------------------------------------------------------//
	//Code php:
	//---------------------------------------------------------------//
		function bdd_connect()
			{
				$host='localhost:3306';
				$dbname='test';
				$identifiant='mawena';
				$password='LegendarY2000';
				// $host='mysql-mawena.alwaysdata.net';
				// $dbname='mawena_1';
				// $identifiant='mawena';
				// $password='LegendarY2000';
				$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $identifiant, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				return $bdd;
			}		
	//---------------------------------------------------------------//
//---------------------------------------------------------------//