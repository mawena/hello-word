<?php
//---------------------------------------------------------------//
	//Importations:
	//---------------------------------------------------------------//
		include_once('Membre.class.php');
	//---------------------------------------------------------------//

	//Class:
	//---------------------------------------------------------------//
		class Admin extends Membre
		{
			//Variables:
			//---------------------------------------------------------------//
				protected $couleur;	
			//---------------------------------------------------------------//

			//Fonctions magiques:
			//---------------------------------------------------------------//
				//1-Constructeurs:
				//---------------------------------------------------------------//
					//---------------------------------------------------------------//
						
					//---------------------------------------------------------------//
				//---------------------------------------------------------------//
				
				//2-Destructeur:
				//---------------------------------------------------------------//
					//---------------------------------------------------------------//
						
					//---------------------------------------------------------------//
				//---------------------------------------------------------------//
			//---------------------------------------------------------------//

			//Getters et Setters:
			//---------------------------------------------------------------//
				//1-Getters:
				//---------------------------------------------------------------//
					//---------------------------------------------------------------//
						public function getCouleur()
						{
							return $this->couleur;
						}
					//---------------------------------------------------------------//
				//---------------------------------------------------------------//

				//2-Setters:
				//---------------------------------------------------------------//
					//---------------------------------------------------------------//
						public function setCouleur($nouvelleCouleur)
						{
							$this->couleur = $nouvelleCouleur;
						}
					//---------------------------------------------------------------//
				//---------------------------------------------------------------//
			//---------------------------------------------------------------//

			//Autres fonctions:
			//---------------------------------------------------------------//
				//---------------------------------------------------------------//
					public function getClass()
					{
						return 'Admin';
					}
				//---------------------------------------------------------------//
			//---------------------------------------------------------------//				

		}
	//---------------------------------------------------------------//
//---------------------------------------------------------------//
?>