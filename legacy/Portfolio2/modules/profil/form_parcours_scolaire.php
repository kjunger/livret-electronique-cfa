<?php
session_start();
$racine = "../../";
include($racine."entete.php");
$db = new mysql();
if(isset($_POST["valider"]))
{

	$parcour = new parcoursScolaire($_POST["id"],$_POST["diplome"],$_POST["lieux"],$_POST["annee"],$_SESSION["user"]);
	$parcour->save();
	
	echo "<script>window.opener.document.location = window.opener.document.location;window.close();</script>";
}

$id = null;
$annee = null;
$diplome = null;
$lieux = null;
$val_submit = "Ajouter";

if(isset($_GET["id"]) && !empty($_GET["id"]))
{
	$id = $_GET["id"];
	$parcour = new parcoursScolaire($id);
	$annee = $parcour->annee;
	$diplome = $parcour->diplome;
	$lieux = $parcour->lieux ;
	$val_submit = "Modifier";
}
?>
<html>
	<head>
	<style>
	@import url("player.css" );
  </style>
	<!--[if IE]>
	<style type="text/css">
	@import url("player_ie.css" );
	</style>
	<![endif]--> 	
	<script src="<?php echo $racine ?>script.js"></script>
	</head>
	<body id="popup">
	<form action="form_parcours_scolaire.php" method="post">
		<input name="id" type="hidden" value="<?php echo $id ?>" size="8">
		Année : <input name="annee" type="text" value="<?php echo $annee ?>">
		Diplome : <input name="diplome" type="text" value="<?php echo $diplome ?>">
		Lieux : <input name="lieux" type="text" value="<?php echo $lieux ?>">		
		<input type="submit" name="valider" value="<?php echo $val_submit ?>">
	</form>
	</body>
</html>

