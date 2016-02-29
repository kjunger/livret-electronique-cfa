<?php
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


		$entreprise = $personne->getEntreprise();
		$entreprise->setNom($_POST["nom"]);
		$entreprise->setRaisonSociale($_POST["raisonSociale"]);
		$entreprise->setNbSalaries($_POST["nbSalaries"]);
		$entreprise->setAdresse($_POST["adresse"]);
		$entreprise->setCP($_POST["cp"]);
		$entreprise->setVille($_POST["ville"]);
		$entreprise->setTel($_POST["tel"]);
		$entreprise->setMail($_POST["mail"]);
		$entreprise->setFax($_POST["fax"]);
		$entreprise->setSite($_POST["site"]);
		$entreprise->save();
		header("location:".$racine."index.php?partie=profil&page=2");
	
}
else
{
$entreprise = $personne->getEntreprise();
?>
<form action="<?php echo $racine?>entreprise.php" method="POST" >
<h1>Entreprise</h1>
		<table id="tab">
			<tr>
				<td>Nom :</td>
				<td><?php creer_input("nom",1,$entreprise->getNom(),"text","maxlength  = 50") ?></td>
			</tr>
			<tr>
				<td>Raison Sociale :</td>
				<td><?php creer_input("raisonSociale",1,$entreprise->getRaisonSociale(),"text","maxlength  = 50") ?></td>
			</tr>
			
			<tr>
				<td>Nombre d'employés :</td>
				<td><?php creer_input("nbSalaries",1,$entreprise->getNbSalaries(),"text","maxlength  = 10") ?></td>
			</tr>
			<tr>
				<td>Adresse :</td>
				<td><?php creer_input("adresse",1,$entreprise->getAdresse(),"text","maxlength  = 150") ?></td>
			</tr>
			<tr>
				<td>Code Postal :</td>
				<td><?php creer_input("cp",1,$entreprise->getCP(),"text","maxlength  = 10") ?></td>
			</tr>
			<tr>
				<td>Ville :</td>
				<td><?php creer_input("ville",1,$entreprise->getVille(),"text","maxlength  = 50") ?></td>
			</tr>
			<tr>
				<td>Téléphone :</td>
				<td><?php creer_input("tel",1,$entreprise->getTel(),"text","maxlength  = 20") ?></td>
			</tr>
			<tr>
				<td>Fax :</td>
				<td><?php creer_input("fax",0,$entreprise->getFax(),"text","maxlength  = 200") ?></td>
			</tr>
			<tr>
				<td>Adresse e-mail :</td>
				<td><?php creer_input("mail",1,$entreprise->getMail(),"text","maxlength  = 100") ?></td>
			</tr>
			<tr>
				<td>Site :</td>
				<td><?php creer_input("site",0,$entreprise->getSite(),"input") ?></td>
			</tr>
			
			<tr><td colspan="2"><?php creer_input("valider",0,"Valider","submit") ?></td></tr>
		</table>

	
</form>
<?php
}
?>