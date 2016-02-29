<?php

class evaluation{
	var $id;
	var $idStage;
	var $idUtilisateur;
	var $date;
	var $commentaire;
	
	function evaluation($id = 0,$date ="",$idStage="",$idUtilisateur="",$commentaire=""){
		global $db;
		
		if($date !="" || $idStage !="" || $idUtilisateur !="" || $commentaire !="")
		{
			$this->id = $id;
			$this->date = $date;
			$this->idStage = $idStage ;
			$this->idUtilisateur = $idUtilisateur;			
			$this->commentaire = $commentaire ;
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from evaluation where id = $id";
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);
				
				$this->id = $resultat["id"];
				$this->date = $resultat["date"];
				$this->idStage = $resultat["idStage"] ;
				$this->idUtilisateur = $resultat["idUtilisateur"];
				$this->commentaire = $resultat["commentaire"] ;
				
				return true;
			}
		$this->num_erreur = 1;
		return false;
	}
	
	function getAuteur()
	{
		
		$auteur =  new utilisateur($this->idUtilisateur) ;
		return $auteur;
	}
	
	function save()
	{
		global $db;
		if(!$this->id)
		{
			$requete = "INSERT INTO evaluation VALUES (	
									'' ,
									'".$this->date."',
									'".$this->idStage."',
									'".$this->idUtilisateur."',
									'".$this->commentaire."');";
			$db->requete($requete,1);						
			$this->id = $db->new_id();
		}
		else
		{
			$requete = "update evaluation set 
									date = '".$this->date."',
									idStage = '".$this->idStage."' ,
									idUtilisateur = '".$this->idUtilisateur."'
									commentaire	 = '".$this->commentaire."'
									where id = ".$this->id.";";
			$db->requete($requete,1);
		}		
	}
	
	function saveChoix($critere,$note,$commentaire)
	{
		global $db;
		$requete = "INSERT INTO note_evaluation VALUES (	
									'".$this->id."',
									'".$critere."',
									'".$note."',
									'".$commentaire."');";									
				
		$db->requete($requete,1);
	}
}

