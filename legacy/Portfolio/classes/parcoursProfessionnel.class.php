<?php

$tab_erreurs  = array();
$tab_erreurs[0] = "Il n'y a aucun erreur.";
$tab_erreurs[1] = "Impossible de récuper l'utilisateur.";
$tab_erreurs[2] = "Votre identifiant ou/et mot de passe sont incorrecte.";

class parcoursProfessionnel
{	
	var $id;
	var $entreprise;
	var $annee;
	var $mission;
	var $duree;
	var $idStagiaire;	
	
	var $num_erreur = 0;


	function parcoursProfessionnel($id = 0,$entreprise ="",$annee ="",$mission="",$duree="",$idStagiaire =""){
		global $db;
		
		if($entreprise!="" || $annee !="" || $mission!="" || $duree!="" || $idStagiaire!="")
		{
			$this->setId($id);
			$this->setEntreprise($entreprise);
			$this->setAnnee($annee);
			$this->setMission($mission);
			$this->setDuree($duree);
			$this->setIdStagiaire($idStagiaire);
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from parcour_professionnel where id = $id";
		$db->requete($requete,1);	
		if($db->nb_resultat(1))
		{
			$resultat = $db->resultat(1);
			
			$this->setId($resultat["id"]);
			
			$this->setEntreprise($resultat["entreprise"]);
			$this->setAnnee($resultat["annee"]);
			$this->setMission($resultat["mission"]);
			$this->setDuree($resultat["duree"]);
			$this->setIdStagiaire($resultat["idStagiaire"]);
			
			return true;
		}
		$this->num_erreur = 1;
		return false;
	}
	
		
	function save(){
		global $db;
		if(!$this->id)
		{
			$requete = "INSERT INTO parcour_professionnel VALUES (	
									'' ,
									'".$this->getEntreprise()."',
									'".$this->getAnnee()."',
									'".$this->getMission()."',
									'".$this->getDuree()."',
									'".$this->getIdStagiaire()."')";
									
			$this->setId($db->new_id());
		}
		else
		{
			$requete = "update parcour_professionnel set 	
									entreprise = '".$this->getEntreprise()."',
									annee = '".$this->getAnnee()."',
									mission = '".$this->getMission()."',
									duree = '".$this->getDuree()."',
									idStagiaire = '".$this->getIdStagiaire()."'
									where id = ".$this->getId().";";
		}
		$db->requete($requete,1);
	}
	
	function delete()
	{
		global $db;
		$requete = "delete from parcour_professionnel where id=".$this->id;	
		$db->requete($requete,1);
	}
	
	//---------------------- SET ------------
	function setId($id){
		$this->id = $id;
	}
	
	function setEntreprise($entreprise){
		$this->entreprise = $entreprise;
	}
	
	function setMission($mission){
		$this->mission = $mission;
	}
	
	function setAnnee($annee){
		$this->annee = $annee;
	}
	
	function setDuree($duree){
		$this->duree = $duree;
	}
	
	function setIdStagiaire($idStagiaire){
		$this->idStagiaire = $idStagiaire;
	}
	
	
	
	//---------------------- FIN  SET ------------
	
	
	//---------------------- GET ------------
	function getId(){
		return $this->id;
	}
	
	function getEntreprise(){
		return $this->entreprise;
	}
	
	function getMission(){
		return $this->mission;
	}
	
	function getAnnee(){
		return $this->annee;
	}
	
	function getDuree(){
		return $this->duree;
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
