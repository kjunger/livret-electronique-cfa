<?php
$reference = "index.php?partie=profil";

$droits_lecture = array(1,2,3);
$droits_modif = array(3);



if(!isset($_SESSION["user"]))
{
	header("location:login.php");
}

?>

<div id="bandeau-gauche">
	<h2 id="titre-bandeau-gauche">PROFIL</h2>
	<ul>
		<li><a href="<?php echo $reference."&page=1"?>">Renseignement Généraux</a> </li>
		<li><a href="<?php echo $reference."&page=2"?>">Entreprise</a> </li>
		
	</ul>
</div>

<div id="affichage">
	<?php 
	$personne = $user;
	$racine = "./modules/profil/";
	if(isset($_GET["page"]))
	{
		switch($_GET["page"])
		{
			case "1" : include($racine.'reseignement_gen.php');break;
			case "2" : include($racine.'entreprise.php');break;
			
			default : include('./modules/profil/reseignement_gen.php');break;
		}	
	}
	else
	{
		include('./modules/profil/reseignement_gen.php');
	}
	
	
	 ?>
</div>




















