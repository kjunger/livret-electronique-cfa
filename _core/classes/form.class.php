<?php
require_once CLSS_DIR . '/user.class.php';
class form {
    private $form_list = array();
    private $user_id;
    private $user_db;
    public function __construct( $user_obj ) {
        $this->user_db = $user_obj->returnDb();
        $user = $user_obj->returnUser();
        $this->user_id = $user[ 'user' ][ 'id' ];
        $stmt = <<<STR
                    SELECT `Formulaire`.`idFormulaire`, `Formulaire`.`nom`, `Formulaire`.`intitule`, `Formulaire`.`type`, `DroitAccesFormulaire`.`typeDroit`
                    FROM `Formulaire`
                    INNER JOIN (`DroitAccesFormulaire`
                        INNER JOIN `Utilisateur`
                        ON `Utilisateur`.`idUtilisateur` = `DroitAccesFormulaire`.`idUtilisateur`
                    ) ON `DroitAccesFormulaire`.`idFormulaire` = `Formulaire`.`idFormulaire`
                    WHERE `Utilisateur`.`idUtilisateur` = :idUtilisateur;
STR;
        $attr = array(
             ":idUtilisateur" => $this->user_id 
        );
        $this->form_list = $this->user_db->run( $stmt, $attr );
    }
    public function returnFormList() {
        return $this->form_list;
    }
    public function setFormComplete( $id_form, $path ) {
        $values = array(
            "emplacementFichier" => $path
        );
        $this->user_db->insert("Fichier", $values);
        $search_id_file = $this->user_db->select("Fichier",  "emplacementFichier LIKE " . $path);
        $values = array(
            "idFormulaireRempli" => $search_id_file[ 0 ][ 'idFichier' ],
            "idFormulaireOrigine" => $id_form
        );
        $this->user_db->insert("FormulaireRempli", $values);
        /*$update = array(
            "typeDroit" => 1
        );
        $attr = array(
            ":idUtilisateur" => $this->user_id,
            ":idFormulaire" => $id_form
        );
        $this->user_db->update("DroitAccesFormulaire", $update, "idUtilisateur = :idUtilisateur AND idFormulaire = :idFormulaire", $attr);*/
    }
}
?>