<?php
namespace App\Entity;
use Core\Entity\Entity;
/**
 * Classe FormulaireEntity
 * Contient des méthodes pour tout objet  de classe FormulaireEntity instancié et stocké dans une variable
 */
class FormulaireEntity extends Entity {
    /**
     * Méthode getUrl() - renvoie l'URL du formulaire souhaité
     * @return string L'URL
     */
    public function getUrl(){
        return "?p=private.form&name={$this->nom}&id={$this->idFormulaire}";
    }
}
