<?php
namespace App\Table;
use \Core\Table\Table;
/**
 * Classe App\Table\EvaluationTable
 * Contient les méthodes utiles pour la table Evaluation.
 * Utilisables à la volée, ou sur un objet instancié et stocké dans une variable (objet de classe EvaluationEntity)
 */
class EvaluationTable extends Table {
    /**
     * Méthode allAccessible() - liste tous les évaluations accessibles en édition par l'utilisateur en cours
     * @param  integer $id_utilisateur L'ID de l'utilisateur en cours
     * @return object  Retourne la liste des Evaluations concernés
     */
    public function allAccessible($id_utilisateur, $id_contrat) {
        return $this->query(
            "SELECT {$this->table}.nom, {$this->table}.intitule
            FROM {$this->table} INNER JOIN
                (DroitAccesEvaluation INNER JOIN Utilisateur
                ON DroitAccesEvaluation.idUtilisateur = Utilisateur.idUtilisateur
                INNER JOIN ContratApprentissage
                ON DroitAccesEvaluation.idContratApprentissage = ContratApprentissage.idContratApprentissage)
            ON {$this->table}.idEvaluation = DroitAccesEvaluation.idEvaluation
            WHERE Utilisateur.idUtilisateur = :id_utilisateur
            AND ContratApprentissage.idContratApprentissage = :id_contrat
            AND DroitAccesEvaluation.typeDroit = 2",
            array(
                ":id_utilisateur" => $id_utilisateur,
                ":id_contrat" => $id_contrat
            )
        );
    }
    /*public function isComplete($id_utilisateur) {
        return $this->query(
            "SELECT *
            FROM EvaluationRempli INNER JOIN
                ({$this->table} INNER JOIN
                    (DroitAccesEvaluation INNER JOIN Utilisateur
                    ON DroitAccesEvaluation.idUtilisateur = Utilisateur.idUtilisateur)
                ON {$this->table}.idEvaluation = DroitAccesEvaluation.idEvaluation)
            ON EvaluationRempli.idEvaluationOrigine = {$this->table}.idEvaluation
            WHERE Utilisateur.idUtilisateur = ?
            AND DroitAccesEvaluation.typeDroit = 2",
            [$id_utilisateur]
        );
    }*/
}
