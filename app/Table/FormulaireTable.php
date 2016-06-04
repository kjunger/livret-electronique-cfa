<?php
namespace App\Table;
use \Core\Table\Table;
/**
 * Classe App\Table\FormulaireTable
 * Contient les méthodes utiles pour la table Formulaire.
 * Utilisables à la volée, ou sur un objet instancié et stocké dans une variable (objet de classe FormulaireEntity)
 */
class FormulaireTable extends Table {
    /**
     * Méthode allAccessible() - liste tous les formulaires accessibles en édition par l'utilisateur en cours
     * @param  integer $id_utilisateur L'ID de l'utilisateur en cours
     * @param  string  $type_form      Le type de formulaire souhaité ("form" ou "eval")
     * @return object  Retourne la liste des formulaires concernés
     */
    public function allAccessible($id_utilisateur, $type_form) {
        return $this->query(
            "SELECT {$this->table}.nom, {$this->table}.intitule, {$this->table}.type
            FROM {$this->table} INNER JOIN
                (DroitAccesFormulaire INNER JOIN Utilisateur
                ON DroitAccesFormulaire.idUtilisateur = Utilisateur.idUtilisateur)
            ON {$this->table}.idFormulaire = DroitAccesFormulaire.idFormulaire
            WHERE Utilisateur.idUtilisateur = :id_utilisateur
            AND {$this->table}.type = :type_form
            AND DroitAccesFormulaire.typeDroit = 2",
            array(
                ':id_utilisateur' => $id_utilisateur,
                ':type_form' => $type_form
            )
        );
    }
    /*public function isComplete($id_utilisateur) {
        return $this->query(
            "SELECT *
            FROM FormulaireRempli INNER JOIN
                ({$this->table} INNER JOIN
                    (DroitAccesFormulaire INNER JOIN Utilisateur
                    ON DroitAccesFormulaire.idUtilisateur = Utilisateur.idUtilisateur)
                ON {$this->table}.idFormulaire = DroitAccesFormulaire.idFormulaire)
            ON FormulaireRempli.idFormulaireOrigine = {$this->table}.idFormulaire
            WHERE Utilisateur.idUtilisateur = ?
            AND DroitAccesFormulaire.typeDroit = 2",
            [$id_utilisateur]
        );
    }*/
}
