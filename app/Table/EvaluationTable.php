<?php
namespace App\Table;
use \Core\Table\Table;
/**
 * Classe App\Table\EvaluationTable
 * Contient les méthodes pour effectuer des requêtes relatives à la table Evaluation (en plus des requêtes génériques de la classe Core\Table\Table).
 */
class EvaluationTable extends Table {
    /**
     * Méthode allAccessible() - liste tous les évaluations accessibles en édition par l'utilisateur en cours
     * @param  integer $id_utilisateur L'ID de l'utilisateur en cours
     * @return object  Retourne la liste des Evaluations concernés
     */
    public function allAccessible($id_utilisateur, $id_contrat) {
        return $this->query(
            "SELECT {$this->table}.idEvaluation, {$this->table}.nom, {$this->table}.intitule
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
    /**
     * Méthode getCompleted() - récupère les ID des évaluations complétées par l'une des parties du contrat susvisé
     * @param  integer $id_form    L'ID de l'évaluation
     * @param  string  $nom_form   Le nom de l'évaluation
     * @param  integer $id_contrat L'ID du contrat
     * @return object  EvaluationEntity Retourne la liste
     */
    public function getCompleted($id_form, $nom_form, $id_contrat) {
        $completed_form = $this->query(
            "SELECT idEvaluationRempli
            FROM EvaluationRempli
            WHERE idEvaluationOrigine = :id_form
            AND idContratApprentissage = :id_contrat",
            array(
                ":id_form" => $id_form,
                ":id_contrat" => $id_contrat
            ),
            true
        );
        return $this->query(
            "SELECT *
            FROM " . ucfirst($nom_form) . "
            WHERE idFormRempli = ?",
            [$completed_form->idEvaluationRempli],
            true
        );
    }
    /**
     * Méthode complete() - pour compléter une évaluation en enregistrant les données qui le nécessitent dans une table de la base de données, et mentionne le Evaluation concerné comme rempli (tout ou partie) pour tel contrat d'apprentissage
     * @param integer $id_form    L'ID de l'évaluation d'origine (cf. table Evaluation)
     * @param array   $data       Les données récupérées depuis l'évaluation
     * @param integer $id_contrat L'ID du contrat d'apprentissage concerné
     */
    public function complete($id_form, $data, $id_contrat) {
        foreach($data as $key => $value) {
            if(strpos('_', $key) !== 0) {
                $exploded_key = explode('_', $key);
                $table = $exploded_key[0];
                $field = $exploded_key[1];
            }
            if(sizeof($this->isComplete($id_form, $id_contrat)) === 0) {
                $this->query(
                    "INSERT INTO EvaluationRempli
                    SET idContratApprentissage = :id_contrat, idEvaluationOrigine = :id_form",
                    array(
                        ":id_contrat" => $id_contrat,
                        ":id_form" => $id_form
                    ),
                    true
                );
                $this->query(
                    "INSERT INTO {$table}
                    SET idFormRempli = :idFormRempli, {$field} = :value",
                    array(
                        ":idFormRempli" => $this->db->lastInsertId(),
                        ":value" => $value
                    ),
                    true
                );
            } else {
                $this->query(
                    "UPDATE {$table}
                    SET {$field} = :value
                    WHERE idFormRempli = :idFormRempli",
                    array(
                        ":value" => $value,
                        ":idFormRempli" => $this->isComplete($id_form, $id_contrat, true)->idEvaluationRempli
                    ),
                    true
                );
            }
        }
    }
    /**
     * Méthode isComplete() - Vérifie si tel ou tel évaluation a été complétée par l'une des parties du contrat susvisé
     * @param  integer $id_form     L'ID de l'évaluation
     * @param  integer $id_contrat  L'ID du contrat
     * @param  boolean [$one=false] Spécifie si l'on attend un seul résultat (true) ou non (false, par défaut)
     * @return object  EvaluationEntity Retourne la liste
     */
    public function isComplete($id_form, $id_contrat, $one=false) {
        return $this->query(
            "SELECT *
            FROM EvaluationRempli
            WHERE idContratApprentissage = :id_contrat
            AND idEvaluationOrigine = :id_form",
            array(
                ":id_contrat" => $id_contrat,
                ":id_form" => $id_form
            ),
            $one
        );
    }
}
