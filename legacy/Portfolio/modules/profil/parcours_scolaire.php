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
{
$tableauParcoursScolaire = $user->getParcourScolaire();
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
	
		
	
	tdDiplome = document.createElement("td");
	diplome = document.createElement("input");
	diplome.setAttribute('name','diplome[]');
	tdDiplome.appendChild(diplome);
	//tdDiplome.appendChild(etoile.cloneNode(true));
	
	tdLieux = document.createElement("td");
	lieux = document.createElement("input");
	lieux.setAttribute('name','lieux[]');
	tdLieux.appendChild(lieux);
	//tdLieux.appendChild(etoile.cloneNode(true));
	
	
	

	tr.appendChild(tdAnnee);
	tr.appendChild(tdDiplome);
	tr.appendChild(tdLieux);
	
	classe = "pair";
	if(i % 2)
		classe = "impair"
	
	i++;
	tr.className = classe;
		
	tableau.appendChild(tr);
}
</script>
<form action="<?php echo $racine?>parcours_scolaire.php" method="POST" >
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
			creer_input("id[]",0,$parcoursScolaire->getId(),"hidden");
			creer_input("annee[]",0,$parcoursScolaire->getAnnee(),"text",'size="8"') ;
			echo "</td><td>";
			creer_input("diplome[]",0,$parcoursScolaire->getDiplome(),"text","maxlength  = 100");
			echo "</td><td>";
			creer_input("lieux[]",0,$parcoursScolaire->getLieux(),"text","maxlength  = 100") ;
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
		?>
		<tr>
			<td colspan="3"><?php creer_input("valider",0,"Enregistrer","submit") ?></td>
		</tr>
	</table>
</form>
<?php
}
?>