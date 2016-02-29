<?php
class categorie_critere{
	var $id;
	var $nom;
	var $criteres = array();
		
	function categorie_critere($id = 0,$nom =""){
		global $db;
		
		if($nom !="" || $desc !="" || $idCategorie !="" )
		{
			$this->id = $id;
			$this->nom = $nom;
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from categorie_critere where id = $id";
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);				
				$this->id = $resultat["id"];
				$this->nom = $resultat["nom"];
								return true;
			}
		$this->num_erreur = 1;
		return false;
	}
	
	function addCritere($critere)
	{
		$this->criteres[] = $critere;
	}
	
	function getCriteres()
	{
		return $this->criteres;
	}
}
?>
