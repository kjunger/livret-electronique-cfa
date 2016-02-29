<?php
if(isset($_POST["valider"]) && $_POST["valider"]=="Enregistrer")
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

	
	
	if($_POST["id"]!="" && $_POST["objectif"]=="" && $_POST["descriptif"]=="" && $_POST["poste"]=="")
	{
		$parcour = new projetProfessionnel($_POST["id"]);
		$parcour->delete();
	}
	elseif($_POST["id"])
	{		
		$parcour = new projetProfessionnel($_POST["id"],$_POST["objectif"],$_POST["descriptif"],$_POST["poste"],$personne->getId());
		$parcour->save();
	}
	header("location:".$racine."index.php?partie=profil&page=4");
	
}
else
{
$projetProfessionnel = $personne->getProjetProfessionnel();

?>

<form action="<?php echo $racine?>projet_professionnel.php" method="POST" >
<h1>Projet Professionnel</h1>
	<table id="tab" class="tab-projet">
		<tr>
			<th>Objectifs</th>
		</tr>
		<tr>
			<td>
				<?php
				creer_input("id",0,$projetProfessionnel->getId(),"hidden");
				creer_input("objectif",0,$projetProfessionnel->getObjectif(),"textarea") ;
				?>
			</td>
		</tr>
		<tr>		
			<th>Descriptions</th>
		</tr>
		<tr>
			<td>
				<?php 
				creer_input("descriptif",0,$projetProfessionnel->getDescriptif(),"textarea");
				?>
			</td>
		</tr>
		<tr>
			<th>Postes Envisagés</th>
		</tr>
		<tr>
			<td>
				<?php 
				creer_input("poste",0,$projetProfessionnel->getPoste(),"textarea");
				?>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td colspan="1"><?php creer_input("valider",0,"Enregistrer","submit") ?></td>
		</tr>
	</table>
</form>
<?php
}
?>