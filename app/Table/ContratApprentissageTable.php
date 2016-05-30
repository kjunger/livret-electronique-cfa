<?php
namespace App\Table;
use \Core\Table\Table;
class ContratApprentissageTable extends Table {
    public function sign($id_utilisateur, $type_utilisateur) {
        return $this->query(
            "UPDATE ContratApprentissage
            SET ContratApprentissage.dateSignature" . ucfirst($type_utilisateur) ." = \"" . date("Y-m-d H:i:s") . "\"
            WHERE id" . ucfirst($type_utilisateur) . " = ?",
            [$id_utilisateur]
        ); //fonctionnel - à modifier pour utiliser la méthode update de la classe \Core\Table\Table
    }
}
