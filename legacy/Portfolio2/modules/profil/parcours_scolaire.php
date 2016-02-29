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
	$user = new utilisateur($_SESSION["user"]);

	$nb_ligne = sizeof($_POST["id"]);
	
	for($i=0;$i<$nb_ligne;$i++)
	{
		if($_POST["id"][$i]!="" && $_POST["diplome"][$i]=="" && $_POST["lieux"][$i]=="" && $_POST["annee"][$i]=="")
		{
			$parcour = new parcoursScolaire($_POST["id"][$i]);
			$parcour->delete();
		}
		elseif($_POST["id"][$i])
		{		
			$parcour = new parcoursScolaire($_POST["id"][$i],$_POST["diplome"][$i],$_POST["lieux"][$i],$_POST["annee"][$i],$user->getId());
			$parcour->save();
		}
		
		header("location:".$racine."index.php?partie=profil&page=2");
	}
}
else
{*/
$tableauParcoursScolaire = $user->getParcourScolaire();
?>
	<h1>Parcours Scolaire</h1>
	<table id="tab">
		<tr>
			<th>Années</th>
			<th>Diplomes</th>
			<th>Lieux</th>
		</tr>
		<?php
		$i = 1;
		foreach($tableauParcoursScolaire as $parcoursScolaire)
		{
			$class = "pair"; 
			if($i % 2)
			{
				$class = "impair"; 
			}
			echo "<tr class='$class	'>";
			echo "<td>";
			echo $parcoursScolaire->getAnnee();
			echo "</td><td>";
			echo $parcoursScolaire->getDiplome();
			echo "</td><td>";
			echo $parcoursScolaire->getLieux() ;
			echo "</td>";
			echo "</tr>";
			$i++;
		}
		echo "<script >var i = $i</script>";
		?>
	</table>

		<?php
			if(in_array($_SESSION["niveau"],$droits_modif))
				echo '<tr><td><a href="javascript:openPopUp(\'modules/profil/form_parcours_scolaire.php\',600,200)">Ajouter une ligne</a></td></tr>';
		?>
		
