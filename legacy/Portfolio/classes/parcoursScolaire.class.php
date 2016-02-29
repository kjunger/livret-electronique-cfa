<?php

$tab_erreurs  = array();
$tab_erreurs[0] = "Il n'y a aucun erreur.";
$tab_erreurs[1] = "Impossible de récuper l'utilisateur.";
$tab_erreurs[2] = "Votre identifiant ou/et mot de passe sont incorrecte.";

class parcoursScolaire
{	
	var $id;
	var $diplome;
	var $lieux;
	var $annee;
	var $idStagiaire;	
	
	var $num_erreur = 0;


	function parcoursScolaire($id = 0,$diplome ="",$lieux ="",$annee="",$idStagiaire =""){
		global $db;
		
		if($diplome!="" || $lieux !="" || $annee!="" || $idStagiaire!="")
		{
			$this->setId($id);
			$this->setDiplome($diplome);
			$this->setLieux($lieux);
			$this->setAnnee($annee);
			$this->setIdStagiaire($idStagiaire);
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from parcour_scolaire where id = $id";
		$db->requete($requete,1);	
		if($db->nb_resultat(1))
		{
			$resultat = $db->resultat(1);
			
			$this->setId($resultat["id"]);
			
			$this->setDiplome($resultat["diplome"]);
			$this->setAnnee($resultat["annee"]);
			$this->setLieux($resultat["lieux"]);
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
			$requete = "INSERT INTO parcour_scolaire VALUES (	
									'' ,
									'".$this->getDiplome()."',
									'".$this->getLieux()."',
									'".$this->getAnnee()."',
									'".$this->getIdStagiaire()."')";
									
			$this->setId($db->new_id());
		}
		else
		{
			$requete = "update parcour_scolaire set 	
									diplome = '".$this->getDiplome()."',
									lieux = '".$this->getLieux()."',
									annee = '".$this->getAnnee()."',
									idStagiaire = '".$this->getIdStagiaire()."'
									where id = ".$this->getId().";";
		}
		$db->requete($requete,1);
	}
	
	function delete()
	{
		global $db;
		$requete = "delete from parcour_scolaire where id=".$this->id;	
		$db->requete($requete,1);
	}
	
	//---------------------- SET ------------
	function setId($id){
		$this->id = $id;
	}
	
	function setDiplome($diplome){
		$this->diplome = $diplome;
	}
	
	function setLieux($lieux){
		$this->lieux = $lieux;
	}
	
	function setAnnee($annee){
		$this->annee = $annee;
	}
	
	function setIdStagiaire($idStagiaire){
		$this->idStagiaire = $idStagiaire;
	}
	
	
	
	//---------------------- FIN  SET ------------
	
	
	//---------------------- GET ------------
	function getId(){
		return $this->id;
	}
	
	function getDiplome(){
		return $this->diplome;
	}
	
	function getLieux(){
		return $this->lieux;
	}
	
	function getAnnee(){
		return $this->annee;
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
