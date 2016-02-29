<script>
function valid()
{
	document.forms["general"].commentaire.value = document.getElementById("input_commentaire").innerHTML;
	document.forms["general"].submit();
}
</script>
<div style="display:none" id="detail"></div>
<?php
include("couleur.php");
if(!empty($_POST))
{
	$eval = new evaluation();
	//$eval->date = date();
	$eval->idStage = $stage->id;
	$eval->idUtilisateur = $user->id;
	$eval->commentaire = mysql_escape_string($_POST["commentaire"]);
	$eval->save();
	
	if(isset($_POST["critere"]))
	{
		foreach($_POST["critere"] as $ident =>$critere)
		{	
			$tab = explode('-', $critere);
			$eval->saveChoix($tab[0],$tab[1],$_POST["crit_comm"][$ident]);
		}
	}	
}
$tableauEvaluations = array();

switch($_SESSION["niveau"])
{
	case 1 : $formationId = $user->idFormation;break;
	case 2 : 
	case 3 : $formationId = $stage->getStagiaire()->idFormation;break;
}

$tableauEvaluations = $stage->getEvaluation();

$formation = new formation($formationId);
$tableauCategories = $formation->getCriteresParCategorie();
	
$temp = array("","","");
$nouvelle = 1;
if($tableauEvaluations)
{
	foreach($tableauEvaluations  as $evaluation)
	{
		if($evaluation->getAuteur() == $user)
			$nouvelle = 0;
			
		switch($evaluation->getAuteur()->getIdNiveau())
		{
			case 1 : $temp[1] = $evaluation;break;	
			case 2 :	$temp[3] = $evaluation;break;
			case 3 : $temp[2] = $evaluation;break;
			default : $temp[] = $evaluation;break;
		}
	}
	$tableauEvaluations = $temp;	
}
	
if($nouvelle)
	echo "<form method='POST' name='general' action='index.php?page=3'>";


echo "<h1>Fiche d'évaluation</h1>";
echo "<div id='stage'>";
$stagiare = $stage->getStagiaire();
$responsableFormation = $stage->getResponsableFormation();
$enseignant = $stage->getEnseignant();
$entreprise = $responsableFormation->getEntreprise();

echo "<table><tr><td>Stagiaire (1)</td><td><a href='index.php?page=1&id=".$stagiare->id."'>".$stagiare->prenom." ".$stagiare->nom."</a></td>";
echo "<td>Responsable en Entreprise (2)</td><td><a href='index.php?page=1&id=".$responsableFormation->id."'>".$responsableFormation->prenom ." ".$responsableFormation->nom."</a></td></tr>";

echo "<tr><td>Tuteur Enseignant (3)</td><td><a href='index.php?page=1&id=".$enseignant->id."'>".$enseignant->prenom." ".$enseignant->nom."</a></td>";
echo "<td>Entreprise</td><td>".$entreprise->nom."</td>";
echo "</tr></table>";
echo "</div>";


echo "<h2>Critères</h2>";

echo "<div id='cat' class='entete'><span>Catégories</span><div  id='moyennes'>Moyennes <div>(1)</div><div>(2)</div><div>(3)</div></div></div>";

foreach($tableauCategories as $categorie)
{	
	echo "<div id='cat'><a href='javascript:display(\"categorie".$categorie->id."\")'>".$categorie->nom."</a>";
	
	$div_critere = "<div class='criteres' id='categorie".$categorie->id."' style='display:none'>";
	$tableauCriteres = $categorie->getCriteres();
	$total = array();
	$nb = 0;
	
	
	
	foreach($tableauCriteres as $critere)
	{

		$div_critere .=  "<div >";
		$div_critere .=  "<a href='javascript:display(\"critere".$critere->id."\")'>".$critere->nom."</a>";
		$div_critere .=  '<div class="desc" id="critere'.$critere->id.'" style="display:none">'.$critere->desc.'</div>';
		$nb++;
		if($nouvelle)
		{
			$div_critere .=  "<div class='nom'>".$user->niveau."</div>";
			$div_critere .=  "<div><pre><select name='critere[]'>";
			$options = $critere->getChoix();

			foreach($options as $option)
				$div_critere .=  "<option value='".$critere->id."-".$option->id."'>".$option->note." - ".$option->desc."</option>";

			$div_critere .=  "</select> <input type ='hidden' name='crit_comm[]' id='crit_comm".$critere->id."' value =''><a href='javascript:popupChampText(\"crit_comm".$critere->id."\")'>Commentaire</a></pre></div>";
		}
		if($tableauEvaluations)
		{	
			foreach($tableauEvaluations  as $evaluation)
			{
				if(!empty($evaluation))
				{
					$div_critere .=  "<div class='nom'>".$evaluation->getAuteur()->niveau."</div>";
					$note = new note("","","",$critere->id,$evaluation->id);
					
					$div_critere .=  "<div style='background-color:".$couleurs[$note->note].";width:". (10 + $note->note*30) ."px'><pre>".$note->desc;
					
					if($note->commentaire)
						$div_critere .="\t<a class='comm' onClick='affich_comm(this)'  comm='".$note->commentaire."'>C</a>";
					$div_critere .= "</pre></div>";

					@$total[$evaluation->getAuteur()->idNiveau] +=   $note->note;
				}
			}
		}
		$div_critere .=  "<hr></div>";
	}	

	$div_critere .=  "</div>";
	
	echo "<div id='moyennes'>";
	
	$ordre = array(1,3,2);
	
	
	foreach($ordre as $id)
	{
		$hauteur = 0;
		if(isset($total[$id]))
		{
			$moy = round($total[$id]/$nb,1);
			$moy_couleur = $couleurs[round($total[$id]/$nb)];
			$hauteur = $moy*10;
			
			if(strlen($moy) ==1)
				$moy .='.0';			
		}
		else
		{			
			$moy = "N/A";
			$moy_couleur = "#FFFFFF";
		}
		
		
		echo "<div style='padding-top:". $hauteur .";background-color : ".$moy_couleur."'>".$moy."</div>";
	}
		
	echo "</div>";
	echo $div_critere ;
	echo "</div>";
	//echo "<script>display('categorie".$categorie->id."')</script>";
	
}

echo "<div id='comm'>";	
echo "<h2>Commentaires</h2><table><tr>";

if($nouvelle)
echo "<th>Vous</th>";	


foreach($tableauEvaluations  as $evaluation)
	if(!empty($evaluation))
		echo "<th class='nom'>".$evaluation->getAuteur()->niveau."</th>";
		echo "<tr></tr>";


if($nouvelle)
	echo "<td><div id='input_commentaire'></div><input type='hidden' name='commentaire'><a href='javascript:popupChampText(\"input_commentaire\")'>Ajouter un commentaire</a></td>";

foreach($tableauEvaluations  as $evaluation)
	if(!empty($evaluation))
		echo "<td class='commentaire'>".$evaluation->commentaire."</td>";
		echo "</tr></table>";		



if($nouvelle)
	echo "<input type='button' onClick='valid()' name='valider' value='Valider'>";


echo "</div>";
echo "</form>";
?>