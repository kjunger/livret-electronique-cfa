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
                    SELECT `Formulaire`.`idFormulaire`, `Formulaire`.`nom`, `Formulaire`.`intitule`, `Formulaire`.`type`, `DroitEdition`.`typeDroit`
                    FROM `Formulaire`
                    INNER JOIN (`DroitEdition`
                        INNER JOIN `Utilisateur`
                        ON `Utilisateur`.`idUtilisateur` = `DroitEdition`.`idUtilisateur`
                    ) ON `DroitEdition`.`idContenu` = `Formulaire`.`idFormulaire`
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
    /*public function registerFormComplete() {
        
    }*/
}
?>