<?php

class stage
{
	var $id;
	var $idStagiaire;
	var $idResponsableFormation;
	var $idResponsableService;
	var $idResponsabmeHierarchique;
	var $idEnseignement;
	var $horaire;
	var $mission;

	function stage($id = 0,$idEleve ="",$idResponsableFormation="",$idResponsableService="",$idResponsabmeHierarchique ="",$idEnseignement ="",$horaire ="",$mission =""){
		global $db;
		
		if($idEleve !="" || $idResponsableFormation !="" || $idResponsableService !="" || $idResponsabmeHierarchique !="" || $idEnseignement!="" ||  $horaire!="" || $mission!="")
		{
			$this->id = $id;
			$this->idStagiaire = $idStagiaire;
			$this->idResponsableFormation = $idResponsableFormation ;
			$this->idResponsableService = $idResponsableService;
			$this->idResponsabmeHierarchique = $idResponsabmeHierarchique;
			$this->idEnseignement = $idEnseignement;
			$this->horaire = $horaire;
			$this->mission = $mission;
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from stage where id = $id";
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);
				
				$this->id = $resultat["id"];
				$this->idStagiaire = $resultat["idStagiaire"];
				$this->idResponsableFormation = $resultat["idResponsableFormation"] ;
				$this->idResponsableService = $resultat["idResponsableService"];
				$this->idResponsabmeHierarchique = $resultat["idResponsabmeHierarchique"];
				$this->idEnseignement = $resultat["idEnseignement"];
				$this->horaire = $resultat["horaire"];
				$this->mission = $resultat["mission"];
				return true;
			}
		$this->num_erreur = 1;
		return false;
	}
	
	
	function getComptesRendus()
	{
		global $db;
		$requete = "select * from comptes_rendus where idStage = ".$this->id ." order by  dateDebut desc";
		$tableau = array();
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				while($resultat = $db->resultat(1))
					$tableau[] = new comptesRendus($resultat["id"],$resultat["dateDebut"],$resultat["dateFin"],$resultat["travaux"], $resultat["objectifs"],$resultat["evaluation"],$resultat["observationApprenti"],$resultat["observationMaitre"],$this->id);
			}
			
		return $tableau;
	}
	//---------------------- SET ------------
	function setId($id){
		$this->id = $id;
	}
	
	function setIdStagiaire($idStagiaire){
		$this->idStagiaire = $idStagiaire;
	}
	
	function setIdResponsableFormation($idResponsableFormation){
		$this->idResponsableFormation = $idResponsableFormation;
	}
	
	function setIdResponsableService($idResponsableService){
		$this->idResponsableService = $idResponsableService;
	}
	
	function setIdResponsableHierarchique($idResponsableHierarchique){
		$this->idResponsableHierarchique = $idResponsableHierarchique;
	}
	
	function setIdEnseignement($idEnseignement){
		$this->idEnseignement = $idEnseignement;
	}
	
	function setHoraire($horaire){
		$this->horaire = $horaire;
	}
	
	function setMission($mission){
		$this->mission = $mission;
	}
	
	//---------------------- FIN  SET ------------
	
	
	//---------------------- GET ------------
	
	function getId(){
		return $this->id ;
	}
	
	function getIdStagiaire(){
		return $this->idStagiaire ;
	}
	
	function getIdResponsableFormation(){
		return $this->idResponsableFormation ;
	}
	
	function getIdResponsableService(){
		return $this->idResponsableService ;
	}
	
	function getIdResponsableHierarchique(){
		return $this->idResponsableHierarchique ;
	}
	
	function getIdEnseignement(){
		return $this->idEnseignement;
	}
	
	function getHoraire(){
		return $this->horaire ;
	}
	
	function getMission(){
		return $this->mission ;
	}
	//---------------------- FIN  GET ------------	
}

?>

