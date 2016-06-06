<?php
namespace App\Entity;
use Core\Entity\Entity;
/**
 * Classe EvaluationEntity
 * Contient des méthodes supplémentaires pour tout objet instancié et stocké dans une variable, qui héritent des méthodes de la classe EvaluationTable
 */
class EvaluationEntity extends Entity {
    /**
     * Méthode getUrl() - renvoie l'URL de l'évaluation souhaitée
     * @return string L'URL
     */
    public function getUrl(){
        return '?p=private.eval&name=' . $this->nom;
    }
}
