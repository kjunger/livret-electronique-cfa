<?php
namespace App\Table;
use \Core\Table\Table;
class UtilisateurTable extends Table {
    public function whoIs($id_partie, $type_partie_unformated, $id_utilisateur, $type_utilisateur_unformated) {
        $type_partie = ucfirst($type_partie_unformated);
        $type_utilisateur = ucfirst($type_utilisateur_unformated);
        return $this->query(
            "SELECT Utilisateur.nom, Utilisateur.prenom, Utilisateur.tel, Utilisateur.port, Utilisateur.email
            FROM Utilisateur
            LEFT JOIN ContratApprentissage ON idUtilisateur = ContratApprentissage.id{$type_partie}
            WHERE ContratApprentissage.id{$type_partie} = :id_partie
            AND ContratApprentissage.id{$type_utilisateur} = :id_utilisateur",
            array(
                ":id_partie" => $id_partie,
                ":id_utilisateur" => $id_utilisateur
            ),
            true
        );
    }
    public function formation($id_utilisateur) {

    }
}
