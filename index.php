<?php
//Page de site
//Demmarage et paramétrage de la session:
//---------------------------------------------------------------//
	empty($_SESSION) ? session_start() : NULL;	//On lance la session si nécéssaire
	ini_set('display_errors', 'On');			//On rend les erreurs visibles
	error_reporting(E_ALL | E_STRICT);			//On reporte les erreurs sur la page

	include_once('./modele/connexion_sql.php');
	include_once('./modele/functions.php');
	include_once('./more/classes/Membre.class.php');
	if(!isset($_SESSION['section']))
	{
		$_SESSION['section'] = 'index';	
	}
//---------------------------------------------------------------//
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mawena Distributions<?php echo " - ".$_SESSION['section']?></title>
		<link rel="stylesheet" href="./more/css/standard.css">
		<link rel="stylesheet" href="./more/css/more_1.css">
	</head>

	<body>
		<header>
		<h1>Mawena Distributions</h1>
		<?php include_once('./more/includes/connecter.php')?>
		</header>
		<?php include_once('./more/includes/naver.php')?>
<?php
//Code source:
//---------------------------------------------------------------//
	if (!isset($_SESSION['section']) OR $_SESSION['section'] == 'index')
	{
		include_once('./controleur/blog/index.php');
	}
	elseif ($_SESSION['section'] == 'video')
	{
		include_once('./controleur/video/index.php');
	}
	elseif ($_SESSION['section'] == 'minichat')
	{
		include_once('./controleur/minichat/index.php');
	}
	elseif ($_SESSION['section'] == 'connexion')
	{
		include_once('./controleur/connexion/index.php');
	}
	else
	{
		include_once('./controleur/blog/index.php');
	}
//---------------------------------------------------------------//
?>
		<footer>
			<p>
			  By <span>Mawena</span>
			</p>
		</footer>
	</body>
</html>