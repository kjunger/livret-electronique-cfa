<?php 

require($racine."classes/sql.class.php");
require($racine."classes/parcoursScolaire.class.php");
require($racine."classes/parcoursProfessionnel.class.php");
require($racine."classes/utilisateur.class.php");
require($racine."classes/projetProfessionnel.class.php");
require($racine."classes/entreprise.class.php");
require($racine."classes/stage.class.php");
require($racine."classes/compteRendu.class.php");



define('LOGIN','root'); //login du serveur sql
define('PASS','root'); //mot de passe de connexion au serveur sql
define('SERVER','localhost'); // serveur sql
define('BDD','portfolio'); // base de donnée utilisée
define('MESS_ERREUR','');
define('SQL_DEBUG','1');



function erreur($message="")
{
	if(!empty($message))
		$_SESSION["erreurs"][] = $message;
	else
	{
		if(isset($_SESSION["erreurs"]))
		{
			$ul = "<ul id='erreurs'>";
			foreach($_SESSION["erreurs"] as $erreur)
			{
				$ul .= "<li>$erreur</li>";
			}
			$ul .= "</ul>";
			return $ul;			
		}
		else 
			return false;
	}	
}

function creer_input($name,$obligatoire=0,$value="",$type="text",$autre="")
{
	global $droits_modif;
		
	if(in_array($_SESSION["niveau"],$droits_modif))
	{
		switch($type)
		{
			case "textarea" : echo "<textarea name='$name' $autre>$value</textarea>";break;
			default : echo "<input type='$type' name='$name' value='$value' $autre>";break;
		}
		
		if($obligatoire)
			echo " <span class='obligatoire'>*</span>";
	}
	else
	{
		if($type!="submit" && $type!="hidden" )
			echo nl2br($value);
			
	}
}

function image($img, $w_max, $h_max,$other=""){
	$size_img = getimagesize($img); // Dimensions de l'image de base
	$w_img = $size_img[0]; // Largeur de l'image de base
	$h_img = $size_img[1]; // Hauteur de l'image de base
	
	$rapport_w = $w_max / $w_img; // Rapport largeur
	$rapport_h = $h_max / $h_img; // Rapport largeur
	
	if($rapport_w<$rapport_h)
		$rapport = $rapport_h;
	else
		$rapport = $rapport_w;
	
	$w_final = ceil($w_img * $rapport); // Largeur miniature arrondie
	$h_final = ceil($h_img * $rapport); // Hauteur miniature arrondie
	
	$size_final = array($w_final, $h_final); // Mise en tableau des dimensions finales
	return "<img src='$img' width='$w_final' height='$h_final' $other>"; // On retourne les dimensions de la miniature sous forme de tableau
} 

function setDate($date)
{
	$pattern_fr = "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})";
	$pattern_us = "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})";	
	
	// Découpe la chaîne
	if(ereg($pattern_fr,$date,$regs))
		// Permute les éléments
		$date = "$regs[3]-$regs[2]-$regs[1]";
	elseif(!ereg($pattern_fr,$date))
		erreur("La date est au mauvaise format (dd/mm/yyyy).");
	return mysql_escape_string($date);		
	
}

?>