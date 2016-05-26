<?php
namespace App\Entity;
use Core\Entity\Entity;
class UtilisateurEntity extends Entity {
    public function getFullName(){
        return $this->prenom . ' ' . $this->nom;
    }
}
