<?php
session_start();
$racine = "../../";
include($racine."entete.php");
include_once($racine."fckeditor/fckeditor.php") ;
$db = new mysql();

if(isset($_POST["valider"]))
{
	$parcour = new parcoursProfessionnel($_POST["id"],$_POST["entreprise"],$_POST["annee"],$_POST["mission"],$_POST["duree"],$_SESSION["user"]);
	$parcour->save();
	
	echo "<script>window.opener.document.location = window.opener.document.location;</script>";
}

$id = null;
$annee = null;
$duree = null;
$entreprise = null;
$mission = null;
$val_submit = "Ajouter";

if(isset($_GET["id"]) && !empty($_GET["id"]))
{
	$id = $_GET["id"];
	$parcour = new parcoursProfessionnel($id);
	$annee = $parcour->annee;
	$duree = $parcour->duree;
	$entreprise = $parcour->entreprise;
	$mission = $parcour->mission ;
	$val_submit = "Modifier";
}
?>
<html>
	<head>
	<style>
	@import url("<?php echo $racine?>player.css" );
  </style>
	<!--[if IE]>
	<style type="text/css">
	@import url("player_ie.css" );
	</style>
	<![endif]--> 	
	<script src="<?php echo $racine ?>script.js"></script>
	</head>
	<body id="popup">
	<form action="form_parcours_professionnel.php" method="post">
		<input name="id" type="hidden" value="<?php echo $id ?>" size="8">
		Année : <input name="annee" type="text" value="<?php echo $annee ?>">
		Duree : <input name="duree" type="text" value="<?php echo $duree ?>">
		Entreprise : <input name="entreprise" type="text" value="<?php echo $entreprise ?>">
		Mission : 
		<?php
		$oFCKeditor = new FCKeditor('mission') ;
		$oFCKeditor->BasePath = $racine.'fckeditor/' ;
		$oFCKeditor->ToolbarSet = 'Perso';
		$oFCKeditor->Value = '<p>This is some <strong>sample text</strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor</a>.</p>' ;
		$oFCKeditor->Create() ;
		?>
		
		<input type="submit" name="valider" value="<?php echo $val_submit ?>">
	</form>
	</body>
</html>

