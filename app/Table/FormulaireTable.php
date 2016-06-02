<?php
namespace App\Table;
use \Core\Table\Table;
class FormulaireTable extends Table {
    /**
     * Méthode allAccessible() - liste tous les formulaires accessibles en édition par l'utilisateur en cours
     * @param integer $id_utilisateur 
     * @param string $type_form 
     * @return object Retourne la liste des formulaires concernés
     */
    public function allAccessible($id_utilisateur, $type_form) {
        return $this->query(
            "SELECT Formulaire.nom, Formulaire.intitule, Formulaire.type
            FROM Formulaire INNER JOIN
                (DroitAccesFormulaire INNER JOIN Utilisateur
                ON DroitAccesFormulaire.idUtilisateur = Utilisateur.idUtilisateur)
            ON Formulaire.idFormulaire = DroitAccesFormulaire.idFormulaire
            WHERE Utilisateur.idUtilisateur = :id_utilisateur
            AND Formulaire.type = :type_form
            AND DroitAccesFormulaire.typeDroit = 2",
            array(
                ':id_utilisateur' => $id_utilisateur,
                ':type_form' => $type_form
            )
        );
    }
}
