<?php

$reference = "index.php";

$droits_lecture = array(1,2,3);
$droits_modif = array();



if(!isset($_SESSION["user"]))
{
	header("location:login.php");
}

$stage = $user->getStage();
$idStagiaire = $stage->getIdStagiaire();
$stagiaire = new utilisateur($idStagiaire);

?>

<div id="bandeau-gauche">
	<h2 id="titre-bandeau-gauche">PROFIL</h2>
	<ul>
		<li><a href="<?php echo $reference."?page=1"?>">Renseignement sur le Stagiaire</a></li>
		<li><a href="<?php echo $reference."?page=2"?>">Comptes Rendus d'activité</a></li>
	</ul>
</div>

<div id="affichage">
	<?php 
	$page = "";
	if(isset($_GET["page"]))
	{
		$page = $_GET["page"];
	}
	
	switch($page)
	{
		case 1:
				$personne = new utilisateur(1);
				$racine = "./modules/profil/";
				include($racine.'reseignement_gen.php');
				include($racine.'parcours_scolaire.php');
				include($racine.'parcours_professionnel.php');
				include($racine.'projet_professionnel.php');
				break;
		case 2: $racine = "./modules/profil/";include($racine.'compteRendu.php');break;
	}
	?>
</div>




















