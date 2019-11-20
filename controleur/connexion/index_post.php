<?php
//Controleur de site
//---------------------------------------------------------------//

	//Lancement et paramètrage de la page
	//---------------------------------------------------------------// 		
		session_start();		//Lance la session
		include_once('../../modele/connexion/get_membre.php');
		include_once('../../more/classes/Membre.class.php');
		include_once('../../modele/connexion_sql.php');			//Importe les fonctions nécéssaires

	//---------------------------------------------------------------//
	
	//Code php:
	//---------------------------------------------------------------//
		if(isset($_POST['Identifiant']) AND isset($_POST['Password']))		//Si les identifiant et le mot de passe sont envoyé en POST
		{
			if (isset($_POST['Signature']) AND isset($_POST['Nom']) AND isset($_POST['Prenoms']) AND isset($_POST['Tel']) AND isset($_POST['Adresse_mail']) AND isset($_POST['Date_de_naissance']) AND isset($_POST['Sexe']))											//Si on veut effectuer un inscription
			{
				
				if (Identifiant_isset($_POST['Identifiant']))				//Si L'indentifiant existe déja
				{
					$_SESSION['erreur']="Identifiant_exist";
				}
				
				else
				{
					$_SESSION['erreur']="";									//On signale qu'il n'y a aucune erruer
					unset($_SESSION['erreur']);								//On suprimme la variable contenant les erreur

					inscription_membre($_POST['Identifiant'],$_POST['Nom'],$_POST['Prenoms'],$_POST['Date_de_naissance'],$_POST['Tel'],$_POST['Password'],"Membre",$_POST['Adresse_mail'],$_POST['Sexe'],$_POST['Signature']);	//On inscrit le membre dans la base de données
					$membre_act=connexion_membre($_POST['Identifiant'],$_POST['Password']);
					$_SESSION['identifiant']=$membre_act->getIdentifiant();	//On enregistre l'identifiant du membre dans la session
					$_SESSION['Fonction']=$membre_act->getFonction();		//On enregistre la fonction du membre dans la session
					$_SESSION['section']=$_SESSION['post_section'];		//On définit le prochaine page à afficher
				}
			}
			else	//Sinon si on veut effectuer une connexion
			{
				if (Identifiant_isset($_POST['Identifiant']))
				{
					$membre_act=connexion_membre($_POST['Identifiant'],$_POST['Password']);		//On crée un membre à partir des données de la base de données
					if (!$membre_act)
					{
						$_SESSION['erreur']='Password_incorect';

					}
					else
					{
						$_SESSION['identifiant']=$membre_act->getIdentifiant();	//On enregistre l'identifiant du membre dans la session
						$_SESSION['Fonction']=$membre_act->getFonction();		//On enregistre la fonction du membre dans la session
						$_SESSION['section']=$_SESSION['post_section'];								//On définit la prochaine page à afficher
						unset($_SESSION['erreur']);								//On suprimme la variable contenant les erreur
					}
				}
				else
				{
					$_SESSION['erreur']='Identifiant_exist_not';
				}				
			}
		}
		if(isset($_GET['connexion']))		
		{
			$_SESSION['connexion']=$_GET['connexion'];
		}
		//Permet d'afficher un formulaire d'inscription ou de connexion

		if(isset($_GET['action']))
		{
			if($_GET['action']=='connecte_moi')
			{
				$_SESSION['section']='connexion';
				unset($_GET['action']);
			}
			else if($_GET['action']=='deconnecte_moi')
			{
				unset($_SESSION['identifiant']);
				unset($_GET['action']);
				$_SESSION['section']=$_SESSION['post_section'];								//On définit la prochaine page à afficher
			}
		}
	//---------------------------------------------------------------//
	header('Location: ../../');	//Retour vers la page controleur
//---------------------------------------------------------------//
