<?php
namespace App\Entity;
use Core\Entity\Entity;
/**
 * Classe EvaluationEntity
 * Contient des méthodes pour tout objet  de classe EvaluationEntityinstancié et stocké dans une variable
 */
class EvaluationEntity extends Entity {
    /**
     * Méthode getUrl() - renvoie l'URL de l'évaluation souhaitée
     * @return string L'URL
     */
    public function getUrl(){
        return "?p=private.eval&name={$this->nom}&id={$this->idEvaluation}";
    }
}
