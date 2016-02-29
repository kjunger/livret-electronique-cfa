<?php


class projetProfessionnel
{	
	var $id;
	var $objectif;
	var $descriptif;
	var $poste;
	var $idStagiaire;	
	
	var $num_erreur = 0;


	function projetProfessionnel($id = 0,$objectif ="",$descriptif="",$poste="",$idStagiaire =""){
		global $db;
		
		if($objectif!="" || $descriptif !="" || $poste!="" || $idStagiaire!="")
		{
			$this->setId($id);
			$this->setObjectif($objectif);
			$this->setDescriptif($descriptif);
			$this->setPoste($poste);
			$this->setIdStagiaire($idStagiaire);
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from projet_professionel where id = $id";
		$db->requete($requete,1);	
		if($db->nb_resultat(1))
		{
			$resultat = $db->resultat(1);
			
			$this->setId($resultat["id"]);
			
			$this->setObjectif($resultat["objectif"]);
			$this->setDescriptif($resultat["descriptif"]);
			$this->setPoste($resultat["poste"]);
			$this->setIdStagiaire($resultat["idStagiaire"]);
			
			return true;
		}
		$this->num_erreur = 1;
		return false;
	}
	
		
	function save()
	{
		global $db;
		if(!$this->id)
		{
			$requete = "INSERT INTO projet_professionel VALUES (	
									'' ,
									'".$this->getObjectif()."',
									'".$this->getDescriptif()."',
									'".$this->getPoste()."',
									'".$this->getIdStagiaire()."')";
									
			$this->setId($db->new_id);
		}
		else
		{
			$requete = "update projet_professionel set 	
									objectif = '".$this->getObjectif()."',
									descriptif = '".$this->getDescriptif()."',
									poste = '".$this->getPoste()."',
									idStagiaire = '".$this->getIdStagiaire()."'
									where id = ".$this->getId().";";
		}
		$db->requete($requete,1);
	}
	
	//---------------------- SET ------------
	function setId($id){
		$this->id = $id;
	}
	
	function setObjectif($objectif){
		$this->objectif = $objectif;
	}
	
	function setDescriptif($descriptif){
		$this->descriptif = $descriptif;
	}
	
	function setPoste($poste){
		$this->poste = $poste;
	}
	
	function setIdStagiaire($idStagiaire){
		$this->idStagiaire = $idStagiaire;
	}
	
	
	
	//---------------------- FIN  SET ------------
	
	
	//---------------------- GET ------------
	function getId(){
		return $this->id;
	}
	
	function getObjectif(){
		return $this->objectif;
	}
	
	function getDescriptif(){
		return $this->descriptif;
	}
	
	function getPoste(){
		return $this->poste;
	}
	
	function getIdStagiaire(){
		return $this->idStagiaire;
	}
	
	
	//---------------------- FIN  GET ------------
	
	
	function erreur(){
		return $this->num_erreur;
	}
	
	function msg_erreur(){
		global $tab_erreurs;
		return $tab_erreurs[$this->num_erreur];
	}
	
	
}




?>
