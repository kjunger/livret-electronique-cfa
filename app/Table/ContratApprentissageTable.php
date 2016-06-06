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
     * @param  integer $id_utilisateur          L'id de l'utilisateur concerné
     * @param  string  $type_utilisateur        Le type de l'utilisateur (apprenti, maître d'apprentissage ou tuteur pédagogique)
     * @param  integer $id_contratApprentissage L'ID du contrat d'apprentissage concerné
     * @return object  PDOStatement Retourne soit un objet PDOStatement, soit false
     */
    public function sign($id_utilisateur, $type_utilisateur, $id_contratApprentissage) {
        return $this->query(
            "UPDATE {$this->table}
            SET {$this->table}.dateSignature" . ucfirst($type_utilisateur) ." = \"" . date("Y-m-d H:i:s") . "\"
            WHERE id" . ucfirst($type_utilisateur) . " = :id_utilisateur
            AND idContratApprentissage = :id_contratApprentissage",
            array(
                ":id_utilisateur" => $id_utilisateur,
                ":id_contratApprentissage" => $id_contratApprentissage
            )
        ); //A noter qu'il aurait été logique à cet instant d'utiliser la méthode update() de la classe \Core\Table\Table dont cette classe hérite, mais la méthode en question étant générique, elle n'accepte qu'une seule clause WHERE. D'où l'utilisation préférée ici de la méthode query().
    }
}
