<?php
namespace App\Table;
use \Core\Table\Table;
class ContratApprentissageTable extends Table {
    /**
     * Méthode sign() - pour signer le contrat pédagogique
     * @param  integer      $id_utilisateur   L'id de l'utilisateur concerné
     * @param  string       $type_utilisateur Le type de l'utilisateur (apprenti, maître d'apprentissage ou tuteur pédagogique)
     * @return object PDOStatement Retourne soit un objet PDOStatement, soit false
     */
    public function sign($id_utilisateur, $type_utilisateur) {
        return $this->query(
            "UPDATE ContratApprentissage
            SET ContratApprentissage.dateSignature" . ucfirst($type_utilisateur) ." = \"" . date("Y-m-d H:i:s") . "\"
            WHERE id" . ucfirst($type_utilisateur) . " = ?",
            [$id_utilisateur]
        ); //fonctionnel, mais à modifier pour utiliser la méthode update de la classe \Core\Table\Table
    }
}
