<?php
namespace App\Entity;
use Core\Entity\Entity;
/**
 * Classe UtilisateurEntity
 * Contient des méthodes supplémentaires pour tout objet instancié et stocké dans une variable, qui héritent des méthodes de la classe UtilisateurTable
 */
class UtilisateurEntity extends Entity {
    /**
     * Méthode getFullName() - retourne le nom en entier de l'utilisateur (sous la forme "Prénom NOM")
     * @return string Le nom
     */
    public function getFullName(){
        return ucfirst($this->prenom) . ' ' . strtoupper($this->nom);
    }
}
