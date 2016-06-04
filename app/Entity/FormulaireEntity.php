<?php
namespace App\Entity;
use Core\Entity\Entity;
/**
 * Classe FormulaireEntity
 * Contient des méthodes supplémentaires pour tout objet instancié et stocké dans une variable, qui héritent des méthodes de la classe FormulaireTable
 */
class FormulaireEntity extends Entity {
    /**
     * Méthode getUrl() - renvoie l'URL du formulaire souhaité
     * @return string L'URL
     */
    public function getUrl(){
        return '?p=private.' . $this->type . '&name=' . $this->nom;
    }
}
