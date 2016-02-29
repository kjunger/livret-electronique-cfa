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
{
$tableauParcoursProfessionnel = $personne->getParcoursProfessionnel();
?>
<script>
function ajouterLigne()
{
	etoile = document.createElement("span");
	etoile.setAttribute("class","obligatoire");
	asterisque = document.createTextNode(" *");
	etoile.appendChild(asterisque);

	tableau = document.getElementById("tab");
	tr = document.createElement("tr");
	
	
	tdAnnee = document.createElement("td");
	
	id = document.createElement("input");
	id.setAttribute('type','hidden');
	id.setAttribute('name','id[]');
	tdAnnee.appendChild(id);
	
	annee = document.createElement("input");
	annee.setAttribute("size","8");
	annee.setAttribute('name','annee[]');
	tdAnnee.appendChild(annee);
	//tdAnnee.appendChild(etoile);
	
		
	
	tdDuree = document.createElement("td");
	duree = document.createElement("input");
	duree.setAttribute("size","10");
	duree.setAttribute('name','duree[]');
	tdDuree.appendChild(duree);
	//tdDiplome.appendChild(etoile.cloneNode(true));
	
	tdEntreprise = document.createElement("td");
	entreprise = document.createElement("input");
	entreprise.setAttribute("size","10");
	entreprise.setAttribute('name','entreprise[]');
	tdEntreprise.appendChild(entreprise);
	//tdLieux.appendChild(etoile.cloneNode(true));
	
	tdMission = document.createElement("td");
	mission = document.createElement("textarea");
	mission.setAttribute('name','mission[]');
	tdMission.appendChild(mission);
	//tdLieux.appendChild(etoile.cloneNode(true));
	

	tr.appendChild(tdAnnee);
	tr.appendChild(tdDuree);
	tr.appendChild(tdEntreprise);
	tr.appendChild(tdMission);
	
	classe = "pair";
	if(i % 2)
		classe = "impair"
	
	i++;
	tr.className = classe;
		
	tableau.appendChild(tr);

}
</script>
<form action="<?php echo $racine?>parcours_professionnel.php" method="POST" >
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
			creer_input("id[]",0,$parcoursProfessionnel->getId(),"hidden");
			creer_input("annee[]",0,$parcoursProfessionnel->getAnnee(),"text",'size="8"') ;
			echo "</td><td>";
			creer_input("duree[]",0,$parcoursProfessionnel->getDuree(),"text",'size="8" maxlength  = "50"');
			echo "</td><td>";
			creer_input("entreprise[]",0,$parcoursProfessionnel->getEntreprise(),"text",'size="10" maxlength  = "150"');
			echo "</td><td>";
			creer_input("mission[]",0,$parcoursProfessionnel->getMission(),"textarea") ;
			echo "</td>";
			echo "</tr>";
			$i++;
		}
		echo "<script >var i = $i</script>";
		?>
	</table>
	<table>
	<?php
			if(in_array($_SESSION["niveau"],$droits_modif))
				echo '<tr><td><a href="javascript:ajouterLigne()">Ajouter une ligne</a></td></tr>';
		?><tr>
			<td colspan="3"><?php creer_input("valider",0,"Enregistrer","submit") ?></td>
		</tr>
	</table>
</form>
<?php
}
?>