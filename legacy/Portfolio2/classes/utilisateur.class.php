<?php
class utilisateur
{	
	var $id;
	var $nom;
	var $prenom;
	var $login;
	var $mdp;
	var $dateNaissance;
	var $adresse;
	var $CP;
	var $ville;
	var $tel;
	var $portable;
	var $mail;
	var $photo;
	var $fax;
	var $idFormation;
	var $idNiveau;
	var $niveau;
	
	
	var $num_erreur = 0;


	function utilisateur($id = 0,$login ="",$mdp=""){
		global $db;
		
		if($id)
		{
			$this->getById($id);			
		}
		else
		{
			$this->connection($login,$mdp);
		}
	}
	
	function getById($id){
		global $db;
		$requete = "select utilisateur.*,niveau.designation from utilisateur inner join niveau on  utilisateur.idNiveau = niveau.id where utilisateur.id = $id";
		$db->requete($requete,1);	
		if($db->nb_resultat(1))
		{
			$resultat = $db->resultat(1);
			
			$this->id = $resultat["id"];
			$this->nom = $resultat["nom"];
			$this->prenom = $resultat["prenom"];
			$this->login = $resultat["login"];
			$this->mpd = $resultat["mdp"];
			$this->dateNaissance = $resultat["dateNaissance"];
			$this->adresse = $resultat["adresse"];
			$this->CP = $resultat["CP"];
			$this->ville = $resultat["ville"];
			$this->tel = $resultat["tel"];
			$this->portable = $resultat["portable"];
			$this->mail = $resultat["mail"];
			$this->photo = $resultat["photo"];
			$this->fax = $resultat["fax"];
			$this->idFormation = $resultat["idFormation"];
			$this->idNiveau = $resultat["idNiveau"];
			$this->niveau = $resultat["designation"];
			return true;
		}
		erreur("Problème lors de la récupération de variable.");
		return false;
	}
	
	function connection($login,$mdp){
		global $db;
		if(!empty($login) && !empty($mdp))
		{
			echo $requete = "select id,mdp from utilisateur where login = '$login'";
			$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);
				if(md5($mdp) == $resultat["mdp"])
				{
					return $this->getById($resultat["id"]);
				}			
			}
		}
		erreur("Erreur d'identification, vérifié votre identifiant et mot de passe.");
		return false;
	}
	
	function save()
	{
		global $db;
		if(!$this->id)
		{
			$requete = "INSERT INTO utilisateur VALUES (	
									'' ,
									'".$this->nom."',
									'".$this->prenom."',
									'".$this->login."',
									'".$this->mdp."' ,
									'".$this->dateNaissance."' ,
									'".$this->adresse."' ,
									'".$this->CP."' ,
									'".$this->ville."' ,
									'".$this->tel."' ,
									'".$this->portable."' ,
									'".$this->mail."' ,
									'".$this->photo."' ,
									'".$this->fax."' ,
									'".$this->idFormation."',
									'".$this->idNiveau."');";
									
			$this->setId($db->new_id);
		}
		else
		{
			$requete = "update utilisateur set 	
									nom = '".$this->nom."',
									prenom = '".$this->prenom."',
									login = '".$this->login."',
									mdp = '".$this->mdp."' ,
									dateNaissance = '".$this->dateNaissance."',
									adresse = '".$this->adresse."' ,
									CP = '".$this->CP."' ,
									ville = '".$this->ville."' ,
									tel = '".$this->tel."' ,
									portable = '".$this->portable."' ,
									mail = '".$this->mail."' ,
									photo = '".$this->photo."' ,
									fax = '".$this->fax."' ,
									idFormation = '".$this->idFormation."',
									idNiveau = '".$this->idNiveau."'
									where id = ".$this->id.";";
		}
		$db->requete($requete,1);
	}
		
	//retourn le tableau avec le parcour scolaire de l'étudiant
	function getParcourScolaire()
	{
		global $db;
		$tableau = array();
		
		$requete = "select * from parcour_scolaire where idStagiaire = ".$this->getId()." order by annee";
		$db->requete($requete,1);	
	
		if($db->nb_resultat(1))
		{
			while($res = $db->resultat(1))
			{
				$tableau[] = new parcoursScolaire($res["id"],$res["diplome"],$res["lieux"],$res["annee"],$res["idStagiaire"]);
			}
		}
		return $tableau;
	}
	
	//retourn le tableau avec le parcour professionel de l'étudiant
	function getParcoursProfessionnel()
	{
		global $db;
		$tableau = array();
		$requete = "select * from parcour_professionnel where idStagiaire = ".$this->getId()." order by annee";
		$db->requete($requete,1);	
	
		if($db->nb_resultat(1))
		{
			while($res = $db->resultat(1))
			{
				$tableau[] = new parcoursProfessionnel($res["id"],$res["entreprise"],$res["annee"],$res["mission"],$res["duree"],$res["idStagiaire"]);
			}
		}
		return $tableau;
	}
	//retourn le tableau avec le projet professionel de l'étudiant
	function getProjetProfessionnel()
	{
		global $db;
		$requete = "select * from projet_professionel where idStagiaire = ".$this->getId();
		$db->requete($requete,1);	
	
		if($db->nb_resultat(1))
		{
			while($res = $db->resultat(1))
			{
				$projet = new projetProfessionnel($res["id"],$res["objectif"],$res["descriptif"],$res["poste"],$res["idStagiaire"]);
			}
		}
		return $projet;
	}
	
	// récupère l'entreprise dans laquelle travail l'utilisateur 
	function getEntreprise()
	{
		global $db;
		$requete = "select idEntreprise from responsable_formation_entreprise where idUtilisateur = ".$this->getId();
		$db->requete($requete,1);	
	
		if($db->nb_resultat(1))
		{
			while($res = $db->resultat(1))
			{
				$entreprise = new entreprise($res["idEntreprise"]);
			}
		}
		return $entreprise;
	}
	
	function getStage()
	{
		global $db;
		$requete = "select id from stage where idStagiaire = ".$this->getId() ." or idResponsableFormation = ".$this->getId()." or idEnseignant = ".$this->getId();
		$db->requete($requete,1);	
	
		if($db->nb_resultat(1))
		{
			while($res = $db->resultat(1))
			{
				$stage = new stage($res["id"]);
			}
		}
		return $stage;
	}
	
	
	//---------------------- SET des varialbe de la class------------
	function setId($id){
		$this->id = $id;
	}
	
	function setNom($nom){
		if(empty($nom))
			erreur("Le nom est obligatoire.");
		else
			$this->nom = mysql_escape_string($nom);
	}
	
	function setPrenom($prenom){
		if(empty($prenom))
			erreur("Le prénom est obligatoire.");
		else
			$this->prenom = mysql_escape_string($prenom);
	}
	
	function setLogin($login){
		$this->login = mysql_escape_string($login);
	}
	
	function setMpd($mdp,$md5 = 0){
		if($md5)
			$this->mdp = md5($mdp);
		else
			$this->mdp = $mdp;
	}
	
	function setDateNaissance($dateNaissance){
		$pattern_fr = "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})";
		$pattern_us = "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})";	
		
	   // Découpe la chaîne
	   if(ereg($pattern_fr,$dateNaissance,$regs))
	      // Permute les éléments
	      $dateNaissance = "$regs[3]-$regs[2]-$regs[1]";
		elseif(!ereg($pattern_fr,$dateNaissance))
			erreur("La date est au mauvaise format (dd/mm/yyyy).");
		$this->dateNaissance = mysql_escape_string($dateNaissance);		
	}
	
	function setAdresse($adresse){
		if(empty($adresse))
			erreur("L'adresse est obligatoire.");
		else
			$this->adresse = mysql_escape_string($adresse);	
	
	}
	
	function setCP($CP){
		if(empty($CP))
			erreur("Le code postal est obligatoire.");
		else
			$this->CP = mysql_escape_string($CP);		
	}
	
	function setVille($ville){
		if(empty($ville))
			erreur("La ville est obligatoire.");
		else
			$this->ville = mysql_escape_string($ville);		
	}
	
	function setTel($tel){
		if(empty($tel))
			erreur("Le téléphone est obligatoire.");
		else
			$this->tel = mysql_escape_string($tel);		
	}
	
	function setPortable($portable){
		$this->portable = mysql_escape_string($portable);		
	}
	
	function setMail($mail){
		if(empty($mail))
			erreur("Ladresse mail est obligatoire.");
		else
		//TODO : testé si le mail est valide "^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,4})$"
		$this->mail = $mail;		
	}

	function setPhoto($photo){
		$this->photo = $photo;		
	}
	
	function setFax($fax){
		$this->fax = mysql_escape_string($fax);		
	}
	
	function setIdFormation($idFormation){
		$this->idFormation = $idFormation;
	}
	
	function setIdNiveau($idNiveau){
		$this->idNiveau = $idNiveau;
	}
	
	//---------------------- FIN  SET ------------
	
	
	//---------------------- GET des variable de la classe------------
	function getId(){
		return $this->id;
	}
	
	function getNom(){
		return $this->nom;
	}
	
	function getPrenom(){
		return $this->prenom;
	}
	
	function getLogin(){
		return $this->login;
	}
	
	function getMdp(){
		$mdp = $this->mdp;
		return $mdp;
	}
	
	function getDateNaissance(){
		$pattern_us = "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})";		
	   // Découpe la chaîne
	   $dateNaissance = $this->dateNaissance;
	   if(ereg($pattern_us,$dateNaissance,$regs))
	      // Permute les éléments
	      $dateNaissance = "$regs[3]/$regs[2]/$regs[1]";		
		return $dateNaissance;
	}
	
	function getAdresse(){
		return $this->adresse;		
	}
	
	function getCP(){
		return $this->CP;		
	}
	
	function getVille(){
		return $this->ville;		
	}
	
	function getTel(){
		return $this->tel;		
	}
	
	function getPortable(){
		return $this->portable;		
	}
	
	function getMail(){
		return $this->mail;		
	}

	function getPhoto(){
		return $this->photo;		
	}
	
	function getFax(){
		return $this->fax;		
	}
	
	function getIdFormation(){
		return $this->idFormation;
	}
	
	function getIdNiveau(){
		return $this->idNiveau;
	}
	//---------------------- FIN  GET ------------
	
	
	
	
	
}




?>
