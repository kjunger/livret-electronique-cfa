<?php
class note{
	var $id;
	var $note; 
	var $desc;
var $commentaire;
		
	function note($id = 0,$note ="",$desc="",$idCritere="",$idEvaluation=""){
		global $db;
		
		if($note =="" && $desc =="" && $idCritere !="" && $idEvaluation !="")
		{
			$this->getNote($idCritere,$idEvaluation);
		}
		if($note !="" || $desc !="")
		{
			$this->id = $id;
			$this->note = $note;
			$this->desc = $desc ;				
						
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getNote($idCritere,$idEvaluation)
	{
		global $db;
		$requete = "select * from note_evaluation where idCritere = $idCritere and idEvaluation = $idEvaluation";
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);				
				$this->getById($resultat["note"]);
				$this->commentaire = $resultat["commentaire"] ;				
				return true;
			}
		$this->num_erreur = 1;
		return false;
	}
	
	function getById($id){
		global $db;
		$requete = "select * from note where id = $id";
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);				
				$this->id = $resultat["id"];
				$this->note = $resultat["note"];
				$this->desc = $resultat["desc"] ;					
				
				return true;
			}
		$this->num_erreur = 1;
		return false;
	}
	/*
	function getNote()
	{
		global $db;
		$requete = "select idNote from note_critere where idCritere = ". $this->id;
		$db->requete($requete,1);	
		$tableau = array();
		if($db->nb_resultat(1))
		{
			while($resultat = $db->resultat(1))
			{
					$tableau[] = new note($resultat["idNote"]);
			}				
			return $tableau;
		}
		$this->num_erreur = 1;
		return false;
	
	}*/
	
	
	
}

