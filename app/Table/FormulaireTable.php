<?php
namespace App\Table;
use \Core\Table\Table;
/**
 * Classe App\Table\FormulaireTable
 * Contient les méthodes pour effectuer des requêtes relatives à la table Formulaire (en plus des requêtes génériques de la classe Core\Table\Table).
 */
class FormulaireTable extends Table {
    /**
     * Méthode allAccessible() - liste tous les formulaires accessibles en édition par l'utilisateur en cours
     * @param  integer $id_utilisateur L'ID de l'utilisateur en cours
     * @param  integer $id_contrat     L'ID du contrat
     * @return object  FormulaireEntity Retourne la liste des formulaires concernés
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
     * Méthode getCompleted() - récupère les ID des formulaires complétés par l'une des parties du contrat susvisé
     * @param  integer $id_form    L'ID du formulaire
     * @param  string  $nom_form   Le nom du formulaire
     * @param  integer $id_contrat L'ID du contrat
     * @return object  FormulaireEntity Retourne la liste
     */
    public function getCompleted($id_form, $nom_form, $id_contrat) {
        $completed_form = $this->query(
            "SELECT idFormulaireRempli
            FROM FormulaireRempli
            WHERE idFormulaireOrigine = :id_form
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
            [$completed_form->idFormulaireRempli],
            true
        );
    }
    /**
     * Méthode complete() - pour compléter un formulaire en enregistrant les données qui le nécessitent dans une table de la base de données, et mentionne le formulaire concerné comme rempli (tout ou partie) pour tel contrat d'apprentissage
     * @param integer $id_form    L'ID du formulaire d'origine (cf. table Formulaire)
     * @param array   $data       Les données récupérées depuis le formulaire
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
                    "INSERT INTO FormulaireRempli
                    SET idContratApprentissage = :id_contrat, idFormulaireOrigine = :id_form",
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
                        ":idFormRempli" => $this->isComplete($id_form, $id_contrat, true)->idFormulaireRempli
                    ),
                    true
                );
            }
        }
    }
    /**
     * Méthode isComplete() - Vérifie si tel ou tel formulaire a été complété par l'une des parties du contrat susvisé
     * @param  integer $id_form     L'ID du formulaire
     * @param  integer $id_contrat  L'ID du contrat
     * @param  boolean [$one=false] Spécifie si l'on attend un seul résultat (true) ou non (false, par défaut)
     * @return object  FormulaireEntity Retourne la liste
     */
    public function isComplete($id_form, $id_contrat, $one=false) {
        return $this->query(
            "SELECT *
            FROM FormulaireRempli
            WHERE idContratApprentissage = :id_contrat
            AND idFormulaireOrigine = :id_form",
            array(
                ":id_contrat" => $id_contrat,
                ":id_form" => $id_form
            ),
            $one
        );
    }
}
