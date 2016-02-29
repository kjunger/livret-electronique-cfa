<?php
session_start();
$racine = "./";
include("entete.php");
$erreur = "";
if(isset($_POST["validation"]) && !empty($_POST["validation"]))
{
	$db = new mysql();
	$eleve = new utilisateur(0,$_POST["login"],$_POST["mdp"]);
	if(erreur())
	{
		$erreur = erreur();
		unset($_SESSION["user"]);
		unset($_SESSION["erreurs"]);
	}
	else
	{
		$_SESSION["user"] = $eleve->getId();
		$_SESSION["niveau"] = $eleve->getIdNiveau();
		header("location:index.php");
	}
}

echo $erreur;
?>
	
	<form action="login.php" method="POST">
	<div>Identifiant : <input type="text" name="login"></div>
	<div>Mot de Passe : <input type="password" name="mdp"></div>
	<div><input type="submit" name="validation" value="Se Connecter"></div>
</form>