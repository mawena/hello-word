<?php
//---------------------------------------------------------------//
	//Class:
	//---------------------------------------------------------------//
		class Membre
		{
			//Variables:
			//---------------------------------------------------------------//
				//---------------------------------------------------------------//
				protected $ID;					//Contient l'ID du membre
				protected $Identifiant;			//Contient le Identifiant du membre
				protected $Nom;					//Contient le nom du membre
				protected $Prenoms;				//Contient le(s) prénom(s) du membre
				protected $Date_de_naissance;	//Contient la date de naissance du membre
				protected $Date_d_hadesion;		//Contient la date d'hadésion du membre
				protected $Tel;					//Contient le numéro de téléphone du membre
				protected $Password;			//Contient le mot de passe du membre
				protected $Fonction;			//Contient la fonction du membre
				protected $Adresse_mail;		//Contient l'email du membre
				protected $Sexe;				//Contient le sexe du membre
				protected $Signature;			//Contient la signature du membre
				//---------------------------------------------------------------//
			//---------------------------------------------------------------//

			//Fonctions magiques:
			//---------------------------------------------------------------//
				//1-Constructeurs:
				//---------------------------------------------------------------//
					//---------------------------------------------------------------//
						public function __construct($ID,$Identifiant,$Nom,$Prenoms,$Date_de_naissance,$Date_d_hadesion,$Tel,$Password,$Fonction,$Adresse_mail,$Sexe,$Signature)
						{
							$this->ID = $ID;
							$this->Identifiant = $Identifiant;
							$this->Nom = $Nom;
							$this->Prenoms = $Prenoms;
							$this->Date_de_naissance = $Date_de_naissance;
							$this->Date_d_hadesion = $Date_d_hadesion;
							$this->Tel = $Tel;
							$this->Password = $Password;
							$this->Fonction = $Fonction;
							$this->Adresse_mail = $Adresse_mail;
							$this->Sexe = $Sexe;
							$this->Signature = $Signature;
						}
					//---------------------------------------------------------------//
				//---------------------------------------------------------------//

				//2-Destructeur:
				//---------------------------------------------------------------//
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
				//---------------------------------------------------------------//
			//---------------------------------------------------------------//

			//Getters et setters:
			//---------------------------------------------------------------//
				//1-Getters:
				//---------------------------------------------------------------//
					//--------------------------------//
						public function getID()
						{
							return $this->ID;
						}//Retourne l'ID du membre
					//--------------------------------//

					//--------------------------------//
						public function getIdentifiant()
						{
							return $this->Identifiant;
						}//Retourne le Identifiant du membre
					//--------------------------------//

					//--------------------------------//
						public function getNom()
						{
							return $this->Nom;
						}//Retourne le Nom du membre
					//--------------------------------//
						
					//--------------------------------//
						public function getPrenoms()
						{
							return $this->Prenoms;
						}//Retourne les Prenoms du membre;
					//--------------------------------//

					//--------------------------------//
						public function getDate_de_naissance()
						{
							return $this->Date_de_naissance;
						}//Retourne la Date de naissance du membre;
					//--------------------------------//

					//--------------------------------//
						public function getDate_d_hadesion()
						{
							return $this->Date_d_hadesion;
						}//Retourne la Date d'hadesion du membre;
					//--------------------------------//

					//--------------------------------//
						public function getTel()
						{
							return $this->Tel;
						}//Retourne le numéro de téléphone du membre;
					//--------------------------------//

					//--------------------------------//
						public function getPassword()
						{
							return $this->Password;
						}//Retourne le mot de passe du membre;
					//--------------------------------//

					//--------------------------------//
						public function getFonction()
						{
							return $this->Fonction;
						}//Retourne la Fonction du membre;
					//--------------------------------//

					//--------------------------------//
						public function getAdresse_mail()
						{
							return $this->Adresse_mail;
						}//Retourne l'adresse mail du membre;
					//--------------------------------//

					//--------------------------------//
						public function getSexe()
						{
							return $this->Sexe;
						}//Retourne le sexe du membre;
					//--------------------------------//
					
					//--------------------------------//
						public function getSignature()
						{
							return $this->Signature;
						}//Retourne la signature du membre;
					//--------------------------------//
					//---------------------------------------------------------------//
				//---------------------------------------------------------------//

				//2-Setters:
				//---------------------------------------------------------------//				
					//---------------------------------------------------------------//
						public function setID($nouveauID)
						{
							if(!empty($nouveauID))
							{
								$this->ID = $nouveauID;
							}//Si $nouveauID existe
						}//Met à jour l'ID du membre
					//---------------------------------------------------------------//
					//---------------------------------------------------------------//
						public function setIdentifiant($nouveauIdentifiant)
						{
							if (!empty($nouveauIdentifiant) AND strlen($nouveauIdentifiant) < 15)
							{
								$this->Identifiant = $nouveauIdentifiant;
							}
							//Si $nouveauIdentifiant existe et si il contient moins de 15 caractères
						}//Met à jour le Identifiant du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setNom($nouveauNom)
						{
							if(!empty($nouveauNom))
							{
								$this->Nom = $nouveauNom;
							}//Si $nouveauNom existe
						}//Met à jour le nom du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setPrenoms($nouveauPrenoms)
						{
							if(!empty($nouveauPrenoms))
							{
								$this->Prenoms = $nouveauPrenoms;
							}//Si $nouveauPrenoms existe
						}//Met à jour les prénoms du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setDate_de_naissance($nouveauDate_de_naissance)
						{
							if(!empty($nouveauDate_de_naissance))
							{
								$this->Date_de_naissance = $nouveauDate_de_naissance;
							}//Si $nouveauDate_de_naissance existe
						}//Met à jour la date de naissance du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setDate_d_hadesion($nouveauDate_d_hadesion)
						{
							if(!empty($nouveauDate_d_hadesion))
							{
								$this->Date_d_hadesion = $nouveauDate_d_hadesion;
							}//Si $nouveauDate_d_hadesion existe
						}//Met à jour la Date d'hadesion du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setTel($nouveauTel)
						{
							if(!empty($nouveauTel))
							{
								$this->Tel = $nouveauTel;
							}//Si $nouveauTel existe
						}//Met à jour le numéro de téléphone du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setPassword($nouveauPassword)
						{
							if(!empty($nouveauPassword))
							{
								$this->Password = $nouveauPassword;
							}//Si $nouveauPassword existe
						}//Met à jour le mot de passe du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setFonction($nouveauFonction)
						{
							if(!empty($nouveauFonction))
							{
								$this->Fonction = $nouveauFonction;
							}//Si $nouveauFonction existe
						}//Met à jour la fonction du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setAdresse_mail($Adresse_mail)
						{
							if(!empty($Adresse_mail) AND preg_match('#^[A-Za-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $Adresse_mail))
							{
								$this->email = $Adresse_mail;
							}//Si $Adresse_mail existe et est valide
						}//Met à jour l'email du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setSexe($nouveauSexe)
						{
							if(!empty($nouveauSexe))
							{
								$this->Sexe = $nouveauSexe;
							}//Si $nouveauSexe existe
						}//Met à jour le sexe du membre
					//---------------------------------------------------------------//

					//---------------------------------------------------------------//
						public function setSignature($nouveauSignature)
						{
							if(!empty($nouveauSignature))
							{
								$this->Signature = $nouveauSignature;
							}//Si $nouveauSignature existe
						}//Met à jour la signature du membre
					//---------------------------------------------------------------//
				//---------------------------------------------------------------//
			//---------------------------------------------------------------//

			//Autres fonctions:
			//---------------------------------------------------------------//
				//---------------------------------------------------------------//
					public function envoyerEMail($titre, $message)
					{
						mail($this->email, $titre, $message);
					}//Envoie un email au membre
				//---------------------------------------------------------------//
				
				//---------------------------------------------------------------//
					public function bannir()
					{
						$this->actif = false;
						$this->envoyerEMail('Vous avez été banni', 'Ne revenez plus!');
					}//Bannie le membre
				//---------------------------------------------------------------//

				//---------------------------------------------------------------//
					public function getClass()
					{
						return 'Membre';
					}
				//---------------------------------------------------------------//
			//---------------------------------------------------------------//
		}
	//---------------------------------------------------------------//
//---------------------------------------------------------------//
?>