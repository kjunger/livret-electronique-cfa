<?php
namespace App\Entity;
use Core\Entity\Entity;
class ContratApprentissageEntity extends Entity {
    /**
     * Méthode getSignature
     * @param  string $type_utilisateur Le type de l'utilisateur
     * @return string Retourne soit la date de signature, soit false
     */
    public function getSignature($type_utilisateur) {
        $id = 'dateSignature' . ucfirst($type_utilisateur);
        return $this->$id;
    }
}
