<?php
function upload(&$fname,$folder = "./photos/")
{
		// Taille maximum
		$MAX_FILE_SIZE = 150000;
		
		// Tableau array des différents types
		$allowed_types = array("image/bmp", "image/gif", "image/pjpeg", "image/jpeg", "image/jpg", "multipart/x-zip", "video/msvideo");

		// Variables récupérée par methode POST du formulaires
		$fname = $_FILES['photo']['name'];
		$ftype = $_FILES['photo']['type'];
		$fsize = $_FILES['photo']['size'];
		$ftmp = $_FILES['photo']['tmp_name'];

		// Diverses test afin de savoir si :
		// Le format de fichier correspond à notre tableau array
		if(!in_array($ftype, $allowed_types)){$error = 1;}

			// La taille du fichier n'est pas dépassée
		if($fsize > $MAX_FILE_SIZE){$error = 2;}

		// Le fichier n'existe pas déjà
		if(file_exists($folder."m_".$fname)){$error = 3;}

				// Si tout va bien, c'est bien déroulé
		if(move_uploaded_file($ftmp,''.$folder.''.$fname.'')) {$error = 0;}
 
		
// Switch servant simplement à la gestion des erreures
		switch($error){
			case'1':
				erreur("Format de fichier incorrecte.");
			break;
			case'2':
				erreur("Fichier trop volumineux.");
			break;
			case'3':
				erreur("Fichier déjà existant.");
			break;
			default : return true;
		}
		return false;		
	
}

if(isset($_POST["valider"]) && $_POST["valider"]=="Valider")
{
	session_start();
	$racine = "../../";
	include($racine."entete.php");
	
	if(!isset($_SESSION["user"]))
	{
	 header("location:".$racine."login.php");
	}

	$db = new mysql();
	$personne = new utilisateur($_SESSION["user"]);
	
	$personne->setNom(urldecode($_POST["nom"]));
	$personne->setPrenom(urldecode($_POST["prenom"]));
	$personne->setDateNaissance($_POST["dateNaissance"]);
	$personne->setAdresse(urldecode($_POST["adresse"]));
	$personne->setCP(urldecode($_POST["cp"]));
	$personne->setVille(urldecode($_POST["ville"]));
	$personne->setTel(urldecode($_POST["tel"]));
	$personne->setPortable(urldecode($_POST["portable"]));
	$personne->setFax(urldecode($_POST["fax"]));
	$personne->setMail(urldecode($_POST["mail"]));
	
	$nomfichier;
	
	if($_FILES['photo']['name'] != "")
	{
		upload($nomfichier,$racine."/photos/");
		$personne->setPhoto($nomfichier);
	}

	if(!$mess = erreur())
	{
		$personne->save();		
	}
	header("location:".$racine."index.php?partie=profil&page=1");
}
else
{

	if(in_array($_SESSION["niveau"],$droits_modif))
	{	?>
		<form action="<?php echo $racine?>reseignement_gen.php" method="POST" enctype="multipart/form-data">
		<table id="tab">
			<tr>
				<td>Nom :</td>
				<td><?php creer_input("nom",1,$personne->getNom(),"text","maxlength  = 50") ?></td>
			</tr>
			<tr>
				<td>Prénom :</td>
				<td><?php creer_input("prenom",1,$personne->getPrenom(),"text","maxlength  = 50") ?></td>
			</tr>
			
			<tr>
				<td>Date de naissance :</td>
				<td><?php creer_input("dateNaissance",1,$personne->getDateNaissance(),"text","maxlength  = 10") ?></td>
			</tr>
			<tr>
				<td>Adresse :</td>
				<td><?php creer_input("adresse",1,$personne->getAdresse(),"text","maxlength  = 150") ?></td>
			</tr>
			<tr>
				<td>Code Postal :</td>
				<td><?php creer_input("cp",1,$personne->getCP(),"text","maxlength  = 10") ?></td>
			</tr>
			<tr>
				<td>Ville :</td>
				<td><?php creer_input("ville",1,$personne->getVille(),"text","maxlength  = 50") ?></td>
			</tr>
			<tr>
				<td>Téléphone :</td>
				<td><?php creer_input("tel",1,$personne->getTel(),"text","maxlength  = 20") ?></td>
			</tr>
			<tr>
				<td>Portable :</td>
				<td><?php creer_input("portable",0,$personne->getPortable(),"text","maxlength  = 20") ?></td>
			</tr>
			<tr>
				<td>Fax :</td>
				<td><?php creer_input("fax",0,$personne->getFax(),"text","maxlength  = 200") ?></td>
			</tr>
			<tr>
				<td>Adresse e-mail :</td>
				<td><?php creer_input("mail",1,$personne->getMail(),"text","maxlength  = 100") ?></td>
			</tr>
			<tr>
				<td>Photo :</td>
				<td><?php creer_input("photo",0,"","file") ?></td>
			</tr>
			<?php
			if($personne->getPhoto() != "" && in_array($_SESSION["niveau"],$droits_modif))
				echo "<tr><td colspan='2'>".image("./photos/".$personne->getPhoto(),150,200)."</td></tr>";
				
				
			if($mess)
			{
				echo "<tr><td colspan='2'>$mess</td></tr>";
				unset($_SESSION["erreurs"]);
			}
			?>
			<tr><td colspan="2"><?php creer_input("valider",0,"Valider","submit") ?></td></tr>
		</table>
	</form>
	<?php 
	}
	else
	{
		?>
		
		<div class="information">
			<?php echo image("./photos/".$personne->getPhoto(),150,200)?>
			<p class="nom"><?php echo $personne->getPrenom()." ".$personne->getNom()?></p>
			<p class="adresse"><?php echo $personne->getAdresse()?><br><?php echo $personne->getCP()?> <?php echo $personne->getVille()?></p>
			<p class="numéro">Tél : <?php echo $personne->getTel()?><br>Portable : <?php echo $personne->getPortable()?><br>Fax : <?php echo $personne->getFax()?>
			<p class="mail"><a href="mailto:<?php echo $personne->getMail() ?>"><?php echo $personne->getMail() ?></a></p>
		</div>
				
		<?php
	}
}
?>