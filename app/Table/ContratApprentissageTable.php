<?php
namespace App\Table;
use \Core\Table\Table;
/**
 * Classe App\Table\ContratApprentissageTable
 * Contient les méthodes utiles pour la table ContratApprentissage.
 * Utilisables à la volée, ou sur un objet instancié et stocké dans une variable (objet de classe ContratApprentissageEntity)
 */
class ContratApprentissageTable extends Table {
    /**
     * Méthode sign() - pour signer le contrat pédagogique
     * @param  integer $id_utilisateur   L'id de l'utilisateur concerné
     * @param  string  $type_utilisateur Le type de l'utilisateur (apprenti, maître d'apprentissage ou tuteur pédagogique)
     * @param  integer $id_apprenti      L'ID de l'apprenti suivi
     * @return object  PDOStatement Retourne soit un objet PDOStatement, soit false
     */
    public function sign($id_utilisateur, $type_utilisateur, $id_apprenti) {
        return $this->query(
            "UPDATE {$this->table}
            SET {$this->table}.dateSignature" . ucfirst($type_utilisateur) ." = \"" . date("Y-m-d H:i:s") . "\"
            WHERE id" . ucfirst($type_utilisateur) . " = :id_utilisateur
            AND idApprenti = :id_apprenti",
            array(
                ":id_utilisateur" => $id_utilisateur,
                ":id_apprenti" => $id_apprenti
            )
        ); //fonctionnel, mais à modifier pour utiliser la méthode update de la classe \Core\Table\Table
    }
}
