<?php
namespace App\Table;
use \Core\Table\Table;
/**
 * Classe App\Table\FormulaireTable
 * Contient les méthodes utiles pour la table Formulaire.
 * Utilisables à la volée
 */
class FormulaireTable extends Table {
    /**
     * Méthode allAccessible() - liste tous les formulaires accessibles en édition par l'utilisateur en cours
     * @param  integer $id_utilisateur L'ID de l'utilisateur en cours
     * @return object  Retourne la liste des formulaires concernés
     */
    public function allAccessible($id_utilisateur, $id_contrat) {
        return $this->query(
            "SELECT {$this->table}.idFormulaire, {$this->table}.nom, {$this->table}.intitule
            FROM {$this->table} INNER JOIN
                (DroitAccesFormulaire INNER JOIN Utilisateur
                ON DroitAccesFormulaire.idUtilisateur = Utilisateur.idUtilisateur
                INNER JOIN ContratApprentissage
                ON DroitAccesFormulaire.idContratApprentissage = ContratApprentissage.idContratApprentissage)
            ON {$this->table}.idFormulaire = DroitAccesFormulaire.idFormulaire
            WHERE Utilisateur.idUtilisateur = :id_utilisateur
            AND ContratApprentissage.idContratApprentissage = :id_contrat
            AND DroitAccesFormulaire.typeDroit = 2",
            array(
                ":id_utilisateur" => $id_utilisateur,
                ":id_contrat" => $id_contrat
            )
        );
    }
    /**
     * [[Description]]
     * @param  [[Type]] id_form     [[Description]]
     * @param  [[Type]] $id_contrat [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function isComplete($id_form, $id_contrat) {
        return $this->query(
            "SELECT *
            FROM FormulaireRempli
            WHERE idContratApprentissage = :id_contrat
            AND idFormulaireOrigine = :id_form",
            array(
                ":id_contrat" => $id_contrat,
                ":id_form" => $id_form
            )
        );
    }
}
