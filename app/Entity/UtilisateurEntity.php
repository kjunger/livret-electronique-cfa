<?php
namespace App\Entity;
use Core\Entity\Entity;
/**
 * Classe UtilisateurEntity
 * Contient des méthodes pour tout objet de classe UtilisateurEntity instancié lors d'une requête sur la table Utilisateur via la classe UtilisateurTable
 */
class UtilisateurEntity extends Entity {
    /**
     * Méthode getFullName() - retourne le nom en entier de l'utilisateur (sous la forme "Prénom NOM")
     * @return string Le nom
     */
    public function getFullName(){
        return ucfirst($this->prenom) . ' ' . strtoupper($this->nom);
    }
    /**
     * Méthode getDate() - retourne une date souhaitée dans le bon format, càd JJ/MM/AAAA
     * @param  string [$type_date = null] La date souhaitée selon son nom dans la base de données (par défaut, null)
     * @return string La date souhaitée formatée
     */
    public function getDate($type_date = null) {
        $date = "date" . ucfirst($type_date);
        $expl_date = explode("-", $this->$date);
        return $expl_date[2] . "/" . $expl_date[1] . "/" . $expl_date[0];
    }
}
