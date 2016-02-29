<?php
/*
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

	$nb_ligne = sizeof($_POST["id"]);
	
	for($i=0;$i<$nb_ligne;$i++)
	{
		if($_POST["id"][$i]!="" && $_POST["annee"][$i]=="" && $_POST["duree"][$i]=="" && $_POST["entreprise"][$i]=="" && $_POST["mission"][$i]=="")
		{
			$parcour = new parcoursProfessionnel($_POST["id"][$i]);
			$parcour->delete();
		}
		elseif($_POST["id"][$i])
		{		
			$parcour = new parcoursProfessionnel($_POST["id"][$i],$_POST["entreprise"][$i],$_POST["annee"][$i],$_POST["mission"][$i],$_POST["duree"][$i],$personne->getId());
			$parcour->save();
		}
		header("location:".$racine."index.php?partie=profil&page=3");
	}
}
else
{*/
$tableauParcoursProfessionnel = $personne->getParcoursProfessionnel();
?>
<h1>Parcours Professionnel</h1>
	<table id="tab">
		<tr>
			<th>Années</th>
			<th>Durées</th>
			<th>Entreprises</th>
			<th>Missions / Fonctions</th>
		</tr>
		<?php
		$i = 1;
		foreach($tableauParcoursProfessionnel as $parcoursProfessionnel)
		{
		
			$class = "pair"; 
			if($i % 2)
			{
				$class = "impair"; 
			}
			echo "<tr class='$class'>";
			echo "<td>";
			echo $parcoursProfessionnel->getAnnee() ;
			echo "</td><td>";
			echo $parcoursProfessionnel->getDuree();
			echo "</td><td>";
			echo $parcoursProfessionnel->getEntreprise();
			echo "</td><td>";
			echo $parcoursProfessionnel->getMission() ;
			echo "</td>";
			echo "</tr>";
			$i++;
		}
	?>
	</table>
	
	<?php
			if(in_array($_SESSION["niveau"],$droits_modif))
				echo '<a href="javascript:openPopUp(\'modules/profil/form_parcours_professionnel.php\',600,500)">Ajouter une ligne</a>';
		?>
	
