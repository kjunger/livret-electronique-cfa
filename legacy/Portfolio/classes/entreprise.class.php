<?php
class entreprise
{	
	var $id;
	var $nom;
	var $raisonSociale;
	var $nbSalaries;
	var $adresse;
	var $CP;
	var $ville;
	var $tel;
	var $fax;
	var $mail;
	var $site;
	
	
	var $num_erreur = 0;


	function entreprise($id = 0){
		global $db;
		
		if($id)
		{
			$this->getById($id);			
		}
		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from entreprise where id = $id";
		$db->requete($requete,1);	
		if($db->nb_resultat(1))
		{
			$resultat = $db->resultat(1);
			
			$this->id = $resultat["id"];
			$this->nom = $resultat["nom"];
			$this->raisonSociale = $resultat["raisonSociale"];
			$this->nbSalaries = $resultat["nbSalaries"];
			$this->adresse = $resultat["adresse"];
			$this->CP = $resultat["CP"];
			$this->ville = $resultat["ville"];
			$this->tel = $resultat["tel"];
			$this->fax = $resultat["fax"];
			$this->mail = $resultat["mail"];
			$this->site = $resultat["site"];
			
			return true;
		}
		erreur("Problème lors de la récupération des variables.");
		return false;
	}
	
	
	function save()
	{
		global $db;
		if(!$this->id)
		{
			$requete = "INSERT INTO entreprise VALUES (	
									'' ,
									'".$this->nom."',
									'".$this->raisonSociale."',
									'".$this->nbSalaries."',
									'".$this->adresse."' ,
									'".$this->CP."' ,
									'".$this->ville."' ,
									'".$this->tel."' ,
									'".$this->fax."' ,
									'".$this->mail."' ,
									'".$this->site."');";
									
			$this->setId($db->new_id);
		}
		else
		{
			$requete = "update entreprise set 	
									nom = '".$this->nom."',
									raisonSociale = '".$this->raisonSociale."',
									nbSalaries = '".$this->nbSalaries."',
									adresse = '".$this->adresse."' ,
									CP = '".$this->CP."' ,
									ville = '".$this->ville."' ,
									tel = '".$this->tel."' ,
									fax = '".$this->fax."' ,
									mail = '".$this->mail."',
									site = '".$this->site."'
									where id = ".$this->id.";";
		}
		$db->requete($requete,1);
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
	
	function setRaisonSociale($raisonSociale){
		if(empty($raisonSociale))
			erreur("Le raison sociale est obligatoire.");
		else
			$this->raisonSociale = mysql_escape_string($raisonSociale);
	}
	
	function setNbSalaries($nbSalaries){
		$this->nbSalaries = mysql_escape_string($nbSalaries);
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
	
	
	function setMail($mail){
		if(empty($mail))
			erreur("Ladresse mail est obligatoire.");
		else
		//TODO : testé si le mail est valide "^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,4})$"
		$this->mail = $mail;		
	}


	function setFax($fax){
		$this->fax = mysql_escape_string($fax);		
	}
	
	function setSite($site){
		$this->site = mysql_escape_string($site);		
	}
	
	
	//---------------------- FIN  SET ------------
	
	
	//---------------------- GET des variable de la classe------------
	function getId(){
		return $this->id;
	}
	
	function getNom(){
		return $this->nom;
	}
	
	function getRaisonSociale(){
		return $this->raisonSociale;
	}
	
	function getNbSalaries(){
		return $this->nbSalaries;
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
	
		
	function getMail(){
		return $this->mail;		
	}

		
	function getFax(){
		return $this->fax;		
	}
	
	function getSite(){
		return $this->site;
	}

	//---------------------- FIN  GET ------------
}




?>
