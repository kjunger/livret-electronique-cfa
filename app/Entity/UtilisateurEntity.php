<?php
namespace App\Entity;
use Core\Entity\Entity;
class UtilisateurEntity extends Entity {
    /**
     * Méthode getFullName() - retourne le nom en entier de l'utilisateur (sous la forme "Prénom NOM")
     * @return string Le nom
     */
    public function getFullName(){
        return ucfirst($this->prenom) . ' ' . strtoupper($this->nom);
    }
}
