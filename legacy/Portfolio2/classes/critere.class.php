<?php
class critere{
	var $id;
	var $nom;
	var $desc;
	var $idCategorie;
		
	function critere($id = 0,$nom ="",$desc="",$idCategorie=""){
		global $db;
		
		if($nom !="" || $desc !="" || $idCategorie !="" )
		{
			$this->id = $id;
			$this->nom = $nom;
			$this->desc = $desc ;
			$this->idCategorie = $idCategorie;			
			
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from criteres where id = $id";
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);				
				$this->id = $resultat["id"];
				$this->nom = $resultat["nom"];
				$this->desc = $resultat["desc"] ;
				$this->idCategorie = $resultat["idCategorie"];					
				return true;
			}
		$this->num_erreur = 1;
		return false;
	}
	
	
	
	function  getChoix()
	{
		global $db;
		$requete = "select idNote from note_critere where idCritere = ". $this->id;
		$db->requete($requete,2);	
		$tableau = array();
		
		if($db->nb_resultat(2))
		{
			while($resultat = $db->resultat(2))
			{
				$tableau[] = new note($resultat["idNote"]);
			}				
			return $tableau;
		}
		$this->num_erreur = 1;
		return false;
	}
	
	
	
}

