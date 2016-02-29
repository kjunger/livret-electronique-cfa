<?php
session_start();
unset($_SESSION["recherche"]);
$chemin_global = ".";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Formation Continue -- Outil de recherche de fichier</title>
<link href="player.css" rel="stylesheet" type="text/css">
<script src="./listage_repertoire/script/script.js"></script>

</head>

<body align="center">
	<div class='zone'>
		<div id='logo'>
				<h1>Centre de Formation Continue</h1>
					<?php include("entete.php")?>
		</div>
		<ul class="titreMenu">
			<li>Outils de recherche de fichiers</li>
				<ul>
					<li class="important"><a href="listage_repertoire">Recherche</a></li>
					<li><a href="listage_repertoire/repertoire.php">Mise à jours des fichiers</a></li>
					<li><a href='javascript:openPopUp("listage_repertoire/formAuteur.php","Ajouter un Auteur")'>Ajouter des auteurs</a></li>
					<li><a href='javascript:openPopUp("listage_repertoire/formExtention.php","Extentions")'>Gérer les extentions</a></li>					
				</ul>			
			
			<li>Outils d'envoi de mail</li>
				<ul>
					<li class="important"><a href="mailing">Envoyer un mail</a></li>
				</ul>
		</ul>

		<p class='copyright'>Copyright 2007 - Université de Rouen - Centre de Formation Continue - Tous droits réservés </p>
	</div>

</body>
</html>	

