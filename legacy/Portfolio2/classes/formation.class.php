<?php

class formation{
	var $id;
	var $nom;
	var $objectif;
	var $diplome;
	var $rythme;
	var $idStructure;
	
	
	function formation($id = 0,$nom ="",$objectif="",$diplome="",$rythme="",$idStructure=""){
		global $db;
		
		if($nom !="" || $objectif !="" || $rythme !=""|| $idStructure !="" )
		{
			$this->id = $id;
			$this->nom = $nom;
			$this->objectif = $objectif ;
			$this->diplome = $diplome;			
			$this->rythme = $rythme;					
		}
		elseif($id)
		{
			$this->getById($id);			
		}		
	}
	
	function getById($id){
		global $db;
		$requete = "select * from  formation where id = $id";
		$db->requete($requete,1);	
			if($db->nb_resultat(1))
			{
				$resultat = $db->resultat(1);				
				
				$this->id = $resultat["id"];
				$this->nom = $resultat["nom"];
				$this->objectif = $resultat["objectif"] ;
				$this->diplome = $resultat["diplome"];
				$this->rythme = $resultat["rythme"];
				$this->idStructure = $resultat["idStructure"];
							
				return true;
			}
		$this->num_erreur = 1;
		return false;
	}
	
	function getCriteresParCategorie()
	{
		global $db;
		$requete = "select criteres.*,categorie_critere.id as ccID, categorie_critere.nom as ccNOM from criteres inner join criteres_formation on criteres.id = criteres_formation.idCritere
							inner join categorie_critere on categorie_critere.id = criteres.idCategorie
							where idFormation = ". $this->id." order by criteres.idCategorie";
		$db->requete($requete,1);	
		$categories = array();
		if($db->nb_resultat(1))
		{
			$ccID  = 0;
			while($resultat = $db->resultat(1))
			{
			
				if($ccID != $resultat["ccID"])
				{
					 $categorie = new categorie_critere($resultat["ccID"],$resultat["ccNOM"]);
					 $categories[] = $categorie;
					 $ccID = $resultat["ccID"];
				}
				
				$critere = new critere($resultat["id"],$resultat["nom"],$resultat["desc"],$resultat["idCategorie"]);
				
				$categorie->addCritere($critere);
			}				
			return $categories;
		}
		$this->num_erreur = 1;
		return false;
	
	}
	
	
	
}

