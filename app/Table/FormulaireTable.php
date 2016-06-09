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
     * @param  [[Type]] $id_form    [[Description]]
     * @param  [[Type]] $nom_form   [[Description]]
     * @param  [[Type]] $id_contrat [[Description]]
     * @return [[Type]] [[Description]]
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
     * [[Description]]
     * @param  [[Type]] $id_form     [[Description]]
     * @param  [[Type]] $id_contrat  [[Description]]
     * @param  [[Type]] [$one=false] [[Description]]
     * @return [[Type]] [[Description]]
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
