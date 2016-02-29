<?php

$reference = "index.php?partie=profil";

$droits_lecture = array(1,2,3);
$droits_modif = array(1);



if(!isset($_SESSION["user"]))
{
	header("location:login.php");
}


?>

<div id="bandeau-gauche">
	<div id="titre-bandeau-gauche">PROFIL</div>
	<ul>
		<li><a href="<?php echo $reference."&page=1"?>">Renseignement Généraux</a> </li>
		<li><a href="<?php echo $reference."&page=2"?>">Parcours Scolaire</a></li>
		<li><a href="<?php echo $reference."&page=3"?>">Parcours Professionnel</a></li>
		<li><a href="<?php echo $reference."&page=4"?>">Projet Professionnel</a></li>
	</ul>
</div>

<div id="affichage">
	<?php 
	$racine = "./modules/profil/";
	if(isset($_GET["page"]))
	{
		switch($_GET["page"])
		{
			
			case "2" : include($racine.'parcours_scolaire.php');break;
			case "3" : include($racine.'parcours_professionnel.php');break;
			case "4" : include($racine.'projet_professionnel.php');break;
			case "1" :
			default : include($racine.'reseignement_gen.php');break;
		}	
	}
	else
	{
		include($racine.'reseignement_gen.php');
	}
	
	
	 ?>
</div>




















