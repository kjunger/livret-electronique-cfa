<?php
namespace App\Entity;
use Core\Entity\Entity;
class FormulaireEntity extends Entity {
    /**
     * Méthode getUrl() - renvoie l'URL du formulaire souhaité
     * @return type
     */
    public function getUrl(){
        return '?p=private.' . $this->type . '&name=' . $this->nom;
    }
}
