<?php

if(isset($_POST["valider_obs_apprenti"]) && $_POST["valider_obs_apprenti"]=="Enregistrer")
	$action ="obs_apprenti";
elseif(isset($_POST["valider_obs_maitre"]) && $_POST["valider_obs_maitre"]=="Enregistrer")
	$action ="obs_maitre";
elseif(isset($_POST["valider"]) && $_POST["valider"]=="Enregistrer")
	$action ="nouvelle";


if(isset($action))
{
	session_start();
	$racine = "../../";
	include($racine."entete.php");
	
	$db = new mysql();
	$eleve = new utilisateur($_SESSION["user"]);
	
	if(!isset($_SESSION["user"]))
	{
	 header("location:".$racine."login.php");
	}
	
	switch($action)
	{
		case "obs_apprenti" :
									$CR = new comptesRendus($_POST["id"]);
									$CR->setObservationApprenti($_POST["observationApprenti"]);
									$CR->save();
									break;
		case "obs_maitre" : 
									$CR = new comptesRendus($_POST["id"]);
									$CR->setObservationMaitre($_POST["observationMaitre"]);
									$CR->save();
									break;
		case "nouvelle" : 
									$CR = new comptesRendus();
									$CR->setDateDebut($_POST["dateDebut"]);
									$CR->setDateFin($_POST["dateFin"]);
									$CR->setTravaux($_POST["travaux"]);
									$CR->setObjectifs($_POST["objectif"]);
									$CR->setEvaluation($_POST["evaluation"]);
									$CR->setIdStage($_POST["idStage"]);
									$CR->save();
									break;
	}
	header("location:".$racine."index.php?page=2");
}
else
{
$tableauComptesRendus = $stage->getComptesRendus();
if(!isset($_SESSION["CR"]))
	$_SESSION["CR"] = 1;
elseif(isset($_GET["action"]))
{
	switch($_GET["action"])
	{
		case "suiv" : $_SESSION["CR"]++;break;
		case "pre" : $_SESSION["CR"]--;break;
		case "new" : $new = 1;break;
	}
	
}

 
if(!isset($new))
{
	$nbCR = sizeof($tableauComptesRendus);
	
	if(!$nbCR)
		die("Encore aucun compte rendu. En créer un : <a href='index.php?page=2&action=new'>nouvelle</a>");
	$i = 1;
	foreach($tableauComptesRendus as $compteRendu)
	{
		if($i==$_SESSION["CR"])
			break;
		$i++;
	}
}
else
{
	$compteRendu = new comptesRendus();	
	$droits_modif = array(1,3);
}
?>
<form action="<?php echo $racine?>compteRendu.php" method="POST" >
	<input type="hidden" name="idStage" value="<?php echo $stage->getId()?>">
	<input type="hidden" name="id" value="<?php echo $compteRendu->getId()?>">
	<h1>Comptes Rendu de L'activité en Entreprise</h1>
	<table id="large">
		
		<tr>
			<td colspan="2" class="date">
				<?php
					if(!isset($new))
					{
						$droits_modif = array();
					}
					
					echo "Du ";
					creer_input("dateDebut",0,$compteRendu->getDateDebut(),"text",'size="8"') ;
					echo " au ";
					creer_input("dateFin",0,$compteRendu->getDateFin(),"text",'size="8"') ;
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2" >
				
			</td>
		</tr>
		<tr>
			<th>Travaux Confiés :</th>
		</tr>
		<tr >
			<td colspan="2">
				<?php creer_input("travaux",0,$compteRendu->getTravaux(),"textarea"); ?>
			</td>
		</tr>
		<tr>
			<th colspan="2">Objectifs et résultats attendus :</th>
		</tr>
		<tr >
			<td colspan="2">
				<?php creer_input("objectif",0,$compteRendu->getObjectifs(),"textarea"); ?>
			</td>
		</tr>
		<tr>
			<th colspan="2">Evaluation de la mise en oeuvre et des résultats :</th>
		</tr>
		<tr>
			<td colspan="2">
				<?php creer_input("evaluation",0,$compteRendu->getEvaluation(),"textarea"); ?>
			</td>
		</tr>
		<tr>
			<th class="observation">Observation de l'Apprenti :</th><th class="observation">Observation du maitre d'apprentissage :</th>
		</tr>
		
		<tr>
			<td class="observation">
				<?php if(isset($new))
							$droits_modif = array();
						else
							$droits_modif = array(1); creer_input("observationApprenti",0,$compteRendu->getObservationApprenti(),"textarea"); ?>
				<br>
				<?php creer_input("valider_obs_apprenti",0,"Enregistrer","submit"); ?>
			</td>
			<td class="observation">
				<?php if(isset($new))
							$droits_modif = array(); 
						else
							$droits_modif = array(3);creer_input("observationMaitre",0,$compteRendu->getObservationMaitre(),"textarea","cols='10'"); ?>
				<br>
				<?php creer_input("valider_obs_maitre",0,"Enregistrer","submit"); ?>
			</td>
		</tr>
	</table>
	<?php
	if(isset($nbCR))
	{
	?>
	<table class="lien">
		<tr>
			<td>
			<?php
				if(1<$_SESSION["CR"])
					echo "<a href='index.php?page=2&action=pre'>précédente</a>";
				else
					echo "&nbsp;";
			?>
			</td>
			<td><a href='index.php?page=2&action=new'>nouvelle</a></td>
			<td>
			<?php
				if($nbCR>$_SESSION["CR"])
					echo "<a href='index.php?page=2&action=suiv'>suivante</a>";
				else
					echo "&nbsp;";
			?>
			</td>
		</tr>
	</table>
	<?php
	}
	else
		if(isset($new))
		{
			$droits_modif = array(1,3); 
			creer_input("valider",0,"Enregistrer","submit");
		}
	?>
	
</form>

<?php
}
?>