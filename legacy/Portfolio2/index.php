<?php
session_start();
$racine = "./";
include($racine."entete.php");

$droits_lecture = array(1,2,3);
$droits_modif = array(1);


if(!isset($_SESSION["user"]))
{
	header("location:".$racine."login.php");
}

$db = new mysql();

$user = new utilisateur($_SESSION["user"]);

if($mess = erreur())
{
	unset($_SESSION["erreurs"]);
	//die($mess);
}	
		

if(isset($_GET["partie"]) && !empty($_GET["partie"]))
{
	switch($_GET["partie"])
	{
		case "profil" : 
					switch($_SESSION["niveau"])
					{
						case 1 : $personne = $user;$partie = $racine."profil_eleve.php";break; //elve
						case 2 : $partie = $racine."profil_tuteur_entreprise.php";break; //enseignant
						case 3 : $partie = $racine."profil_tuteur_entreprise.php";break; //responsable en entreprise
					};break;
					
		case "deconnexion" : unset($_SESSION["user"]);header("location:".$racine."login.php");break;
		default :
	}
}
else
{
	switch($_SESSION["niveau"])
	{
		case 1 : $partie = $racine."accueil_eleve.php";break; //elve
		case 2 : $partie = $racine."accueil_tuteur_entreprise.php";break; //enseignant
		case 3 : $partie = $racine."accueil_tuteur_entreprise.php";break; //responsable en entreprise
	}
}

?>


<html>
	<head>
	<title>Formation Continue -- ePortfolio</title>
	<!--<link href="player.css" rel="stylesheet" type="text/css">-->
	<style>
	@import url("player.css" );
  </style>
	<!--[if IE]>
	<style type="text/css">
	@import url("player_ie.css" );
	</style>
	<![endif]--> 
	
	<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript" src="effects.js"></script>
<script src="script.js"></script>

	</head>
	<body  style="text-align: center">	
		<div id="page">
			<div id='logo'>
				<img src="images/banniere.png">
			</div>
			<div id="barre_menu">
				<div id="nom_user"><?php echo $user->getPrenom()." ".$user->getNom()?></div>
				
				<ul id="menu">
					<li><a href="<?php echo $racine ?>index.php" id="accueil"><img src="images/accueil.png" title="Accueil" alt="Accueil"></a></li>
					<li><a href="<?php echo $racine ?>index.php?partie=profil" id="fiche"><img src="images/profil.png" title="Fiche"alt="Fiche"></a></li>
					<li><a href="<?php echo $racine ?>index.php?partie=deconnexion" id="déconnexion"><img src="images/deco.png" title="Déconnexion"alt="Déconnexion"></a></li>
				</ul>
			</div>
			
			<div id="contenue">			
				<?php
					if(isset($partie))
					{
						include($partie);
					}
				?>
			</div>
			<div id="spacer_bottom"></div>
			<div class='copyright'><p >Copyright 2007 - Université de Rouen - Centre de Formation Continue - Tous droits réservés </p></div>
			
		</div>
	</body>
</html>