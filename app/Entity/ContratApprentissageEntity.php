<?php
namespace App\Entity;
use Core\Entity\Entity;
/**
 * Classe ContratApprentissageEntity
 * Contient des méthodes pour tout objet de classe ContratApprentissageEntity instancié lors d'une requête sur la table ContratApprentissage via la classe ContratApprentissageTable
 */
class ContratApprentissageEntity extends Entity {
    /**
     * Méthode getSignature() - vérifier si le contrat pédagogique a été signé par l'utilisateur concerné
     * @param  string $type_utilisateur Le type de l'utilisateur
     * @return string Retourne soit la date de signature, soit false
     */
    public function getSignature($type_utilisateur) {
        $id = 'dateSignature' . ucfirst($type_utilisateur);
        return $this->$id;
    }
}
