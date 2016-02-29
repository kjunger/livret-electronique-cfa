<?php


class comptesRendus
{	
	var $id;
	var $dateDebut;
	var $dateFin;
	var $travaux;
	var $objectifs;
	var $evaluation;
	var $observationApprenti;
	var $observationMaitre;
	var $idStage;

	
 
	function comptesRendus($id = 0,$dateDebut ="",$dateFin="",$travaux="",$objectifs ="",$evalutation ="",$observationApprenti ="",$observationMaitre ="",$idStage =""){
		global $db;
		
		if($dateDebut !="" || $dateFin !="" || $travaux !="" || $objectifs !="" || $evalutation!="" ||  $observationApprenti!="" || $observationMaitre!="" || $idStage!="")
		{
			$this->id = $id;
			$this->dateDebut = $dateDebut;
			$this->dateFin = $dateFin ;
			$this->travaux = $travaux;
			$this->objectifs = $objectifs;
			$this->evalutation = $evalutation;
			$this->observationApprenti = $observationApprenti;
			$this->observationMaitre = $observationMaitre;
			$this->idStage = $idStage;
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id)
	{	
		global $db;
		$requete = "select * from comptes_rendus where id = $id";
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);
				
				$this->id = $resultat["id"];
				$this->dateDebut = $resultat["dateDebut"];
				$this->dateFin = $resultat["dateFin"] ;
				$this->travaux = $resultat["travaux"];
				$this->objectifs = $resultat["objectifs"];
				$this->evaluation = $resultat["evaluation"];
				$this->observationApprenti = $resultat["observationApprenti"];
				$this->observationMaitre = $resultat["observationMaitre"];
				$this->idStage = $resultat["idStage"];
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
			$requete = "INSERT INTO comptes_rendus VALUES (	
									'' ,
									'".$this->dateDebut."',
									'".$this->dateFin."',
									'".$this->travaux."' ,
									'".$this->objectifs."' ,
									'".$this->evaluation."' ,
									'".$this->observationApprenti."' ,
									'".$this->observationMaitre."' ,
									'".$this->idStage."');";
									
			$this->setId($db->new_id());
		}
		else
		{
			$requete = "update comptes_rendus set 	
									dateDebut = '".mysql_escape_string($this->dateDebut).")',
									dateFin = '".mysql_escape_string($this->dateFin)."',
									travaux = '".mysql_escape_string($this->travaux)."',
									objectifs = '".mysql_escape_string($this->objectifs)."' ,
									evaluation = '".mysql_escape_string($this->evaluation)."',
									observationApprenti = '".mysql_escape_string($this->observationApprenti)."' ,
									observationMaitre = '".mysql_escape_string($this->observationMaitre)."' ,
									idStage = ".$this->idStage." 
									where id = ".$this->id ;
		}
		echo $requete;
		$db->requete($requete,1);
	}
	//-----------------------SET ---------------
	
	function setId($id){
		$this->id =$id;
	}
	
	function setObservationApprenti($texte){
		$this->observationApprenti = $texte;
	}
	
	function setObservationMaitre($texte){
		$this->observationMaitre =$texte;
	}
	
	function setDateDebut($dateDebut){
		$this->dateDebut = setDate($dateDebut);		
	}
	
	function setDateFin($dateFin){
		$this->dateFin = setDate($dateFin);		
	}
	
	function setTravaux($travaux){
		$this->travaux = setDate($travaux);		
	}
	function setObjectifs($objectif){
		$this->objectifs = setDate($objectif);		
	}
	function setEvaluation($evaluation){
		$this->evaluation = setDate($evaluation);		
	}
	
	function setIdStage($idStage){
		$this->idStage = setDate($idStage);		
	}
	
	//---------------------- GET ------------
	
	function getId(){
		return $this->id ;
	}
	
	function getDateDebut(){
		$pattern_us = "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})";		
	   // Découpe la chaîne
	   $dateNaissance = $this->dateDebut;
	   if(ereg($pattern_us,$dateNaissance,$regs))
	      // Permute les éléments
	      $dateNaissance = "$regs[3]/$regs[2]/$regs[1]";		
		return $dateNaissance;
	
		
	}
	
	function getDateFin(){
		$pattern_us = "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})";		
	   // Découpe la chaîne
	   $dateNaissance = $this->dateFin;
	   if(ereg($pattern_us,$dateNaissance,$regs))
	      // Permute les éléments
	      $dateNaissance = "$regs[3]/$regs[2]/$regs[1]";		
		return $dateNaissance;
	}
	
	function getTravaux(){
		return $this->travaux ;
	}
	
	function getObjectifs(){
		return $this->objectifs ;
	}
	
	function getEvaluation(){
		return $this->evaluation;
	}
	
	function getObservationApprenti(){
		return $this->observationApprenti ;
	}
	
	function getObservationMaitre(){
		return $this->observationMaitre ;
	}
	
	function getIdStage(){
		return $this->idStage ;
	}
	



}