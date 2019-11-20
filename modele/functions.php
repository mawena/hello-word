<?php
//Page de site
//---------------------------------------------------------------//
	//Code php:
	//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		function vi1($name, $link) //Affiche une video avec un titre
		{
			echo '<h1>'.$name.'</h1>';
			echo '<video src="../videos/'.$link.'.mp4" width="100%" controls preload=auto></video><br/>';
		}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//
		function vi2($link)	//Affiche une video sans un titre
		{
			echo '<video src="../videos/'.$link.'.mp4" width="100%" controls preload=auto></video><br/>';
		}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//
		function head1($compt)	//permet de déterminer un style
		{
			if ($compt==0)
			{
				echo '
					<head>
						<link rel="stylesheet" href="../settings/style.css"/>
					</head>
				';
			}
			else
			{
				echo '
					<head>
						<link rel="stylesheet" href="../settings/style'.$compt.'.css"/>
					</head>
				';
			}
		}
		//---------------------------------------------------------------//
		
		//---------------------------------------------------------------//
		function men($title, $link, $repair, $compt) //permet d'ajouter un lien au menu
		{
			if ($compt == $repair)
			{
				echo '<a href="'.$link.'" class="trois">'.$title.'</a>';
			}
			else
			{
				echo '<a href="'.$link.'">'.$title.'</a>';
			}
			$compt++;
			return $compt;
		}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//
		function mena($title, $link, $section) //permet d'ajouter un lien au menu
		{
			if ($_SESSION['section'] == $section)
			{
				echo '<a href="'.$link.'" class="trois">'.$title.'</a>';
			}
			else
			{
				echo '<a href="'.$link.'">'.$title.'</a>';
			}
		}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//
		function cal_nbre_page($nbre_element, $nbre_element_par_page) //permet de calculer le nombre de sous-page d'une page
		{
			if(($nbre_element%$nbre_element_par_page)!=0) // Si le nombre d'élement n'est pas un multiple du nombre d'élément par page
			{
				$test = (((int)($nbre_element/$nbre_element_par_page))+1);
			}
			else
			{
				$test = (int)($nbre_element/$nbre_element_par_page);
			}
			return $test;
		}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//		
		function menu_navigation($nbre_page, $link, $repair)	//permet de naviguer parmis les sous pages d'une page
		{

			$c=0;
			if($nbre_page>1)	
			{

				echo "<nav>
						<span class=\"rep\">";
				echo "les poules ont des dents";
				//Permet de naviguer entre les pages

				for($i=1; $i<=$nbre_page; $i++) 
				{
					$c++;
					if ($c>5)
					{
						echo "</span><div class='animation start-home'></div></nav><nav>";
						$c=1;
					}
					
					$link_me = $link.$i;
					men($i, $link_me, $repair, $i);
										
					
				}

				echo'</span><div class="animation start-home"></div></nav>';

			}
		}
		//---------------------------------------------------------------//

		//---------------------------------------------------------------//
		function sectionner($section_name)	//permet d'ajouter une section
		{
			if (!isset($_SESSION['section']))
			{
				include_once('../mvc/controleur/blog/index.php');	
			}
			if ($_SESSION['section'] == $section_name)
			{
				include_once('../mvc/controleur/'.$section_name.'/index.php');
			}
		}
		
		//---------------------------------------------------------------//

	//---------------------------------------------------------------//
//---------------------------------------------------------------//
?>