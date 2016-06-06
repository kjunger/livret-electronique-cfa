<?php
namespace App\Table;
use \Core\Table\Table;
/**
 * Classe App\Table\UtilisateurTable
 * Contient les méthodes utiles pour la table Utilisateur.
 * Utilisables à la volée
 */
class UtilisateurTable extends Table {
    /**
     * Méthode whoIs() - dans le cas d'un apprenti, d'un maître d'apprentissage ou d'un tuteur pédagogique - recherche qui est l'apprenti, le maître d'apprentissage ou le tuteur pédagogique qui lui est/sont associé(s), et récupère les informations associées
     * @param  integer $id_partie        ID utilisateur de la partie prenante recherchée (apprenti, maître d'apprentissage ou tuteur pédagogique)
     * @param  string  $type_partie      Type d'utilisateur pour la partie prenante recherchée ("apprenti", "maitreApprentissage", "tuteurPedagogique")
     * @param  integer $id_utilisateur   ID de l'utisateur en cours
     * @param  string  $type_utilisateur Type de l'utilisateur en cours ("apprenti", "maitreApprentissage", "tuteurPedagogique")
     * @return object  Retourne les informations de la partie prenante recherchée
     */
    public function whoIs($id_partie, $type_partie, $id_utilisateur, $type_utilisateur) {
        return $this->query(
            "SELECT {$this->table}.idUtilisateur, {$this->table}.nom, {$this->table}.prenom, {$this->table}.tel, {$this->table}.port, {$this->table}.email
            FROM {$this->table}
            LEFT JOIN ContratApprentissage ON idUtilisateur = ContratApprentissage.id{$type_partie}
            WHERE ContratApprentissage.id" . ucfirst($type_partie) . " = :id_partie
            AND ContratApprentissage.id" . ucfirst($type_utilisateur) . " = :id_utilisateur",
            array(
                ":id_partie" => $id_partie,
                ":id_utilisateur" => $id_utilisateur
            ),
            true
        );
    }
    /**
     * Méthode formation() - dans le cas d'un apprenti ou d'un tuteur pédagogique, retourne les informations sur la formation à laquelle il est rattaché
     * @param  integer $id_utilisateur L'ID de l'apprenti ou du tuteur susvisé
     * @return object  Retourne les informations sur la formation à laquelle l'utilisateur est rattachée
     */
    public function formation($id_utilisateur) {
        return $this->query(
            "SELECT *
            FROM Composante INNER JOIN
                (Formation INNER JOIN
                    (RattachementFormation INNER JOIN {$this->table}
                    ON RattachementFormation.idUtilisateur = {$this->table}.idUtilisateur)
                ON Formation.idFormation = RattachementFormation.idFormation)
            ON Composante.idComposante = Formation.idComposante
            WHERE {$this->table}.idUtilisateur = ?",
            [$id_utilisateur],
            true
        );  //Requête à améliorer
    }
    /**
     * Méthode infosApprenti() - dans le cas d'un apprenti, récupère des infos personnelles supplémentaires
     * @param  integer $id_utilisateur L'ID de l'apprenti susvisé
     * @return object  Retourne les informations supplémentaires
     */
    public function infosApprenti($id_apprenti) {
        return $this->query(
            "SELECT *
            FROM InfosApprenti INNER JOIN {$this->table}
            ON InfosApprenti.idApprenti = {$this->table}.idUtilisateur
            WHERE Utilisateur.idUtilisateur = ?",
            [$id_apprenti],
            true
        );  //Là aussi
    }

    /**
     * Méthode entreprise() - dans le cas d'un maître d'apprentissage, retourne les informations sur l'entreprise à laquelle il est rattaché
     * @param  integer $id_utilisateur L'ID du maître d'apprentissage susvisé
     * @return object  Retourne les informations sur l'entreprise à laquelle l'utilisateur est rattachée
     */
    public function entreprise($id_maitreApp) {
        return $this->query(
            "SELECT *
            FROM Entreprise INNER JOIN
                (RattachementEntreprise INNER JOIN {$this->table}
                ON RattachementEntreprise.idMaitreApprentissage = {$this->table}.idUtilisateur)
            ON Entreprise.idEntreprise = RattachementEntreprise.idEntreprise
            WHERE {$this->table}.idUtilisateur = ?",
            [$id_maitreApp],
            true
        );  //Idem
    }
}
