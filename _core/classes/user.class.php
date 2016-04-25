<?php
require_once 'db.class.php';
abstract class user {
    protected $db;
    protected $user = array();
    protected function __construct( $db, $id ) {
        $this->initDb( $db );
        $this->db->setErrorCallbackFunction( "echo" );
        $stmt = <<<STR
                SET CHARACTER SET utf8;
STR;
        $this->db->run( $stmt );
        $this->initUser( $id );
    }
    private function initDb( $db ) {
        $this->db = new db( "mysql:host=" . $db[ "host" ] . ";port=" . $db[ "port" ] . ";dbname=" . $db[ "name" ], $db[ "user" ], $db[ "pass" ] );
    }
    private function initUser( $id ) {
        $search = $this->db->select( "Utilisateur", "idUtilisateur = " . $id );
        $this->user[ 'user' ] = array(
             'id' => $search[ 0 ][ 'idUtilisateur' ],
            'login' => $search[ 0 ][ 'login' ],
            'nom' => $search[ 0 ][ 'nom' ],
            'prenom' => $search[ 0 ][ 'prenom' ],
            'tel' => $search[ 0 ][ 'tel' ],
            'port' => $search[ 0 ][ 'port' ],
            'email' => $search[ 0 ][ 'email' ] 
        );
    }
    public function returnUser() {
        return $this->user;
    }
    public function returnDb() {
        return $this->db;
    }
}
final class apprenti extends user {
    public function __construct( $db, $id ) {
        parent::__construct( $db, $id );
        $this->getApprenti();
        $this->getMaitreApprentissage();
        $this->getTuteurPedagogique();
    }
    //Getters
    private function getApprenti() {
        $searchApprenti = $this->db->select( "InfosApprenti", "idApprenti = " . $this->user[ 'user' ][ 'id' ] );
        $this->user[ 'user' ][ 'adresse' ] = $searchApprenti[ 0 ][ 'adApprenti' ];
        $this->user[ 'user' ][ 'cp' ] = $searchApprenti[ 0 ][ 'cpApprenti' ];
        $this->user[ 'user' ][ 'ville' ] = $searchApprenti[ 0 ][ 'villeApprenti' ];
        $stmtFormation = <<<STR
                SELECT * FROM `Composante`
                INNER JOIN (`Formation`
                    INNER JOIN `RattachementFormation`
                    ON `RattachementFormation`.`idFormation` = `Formation`.`idFormation`
                ) ON `Formation`.`idComposante` = `Composante`.`idComposante`
                WHERE `RattachementFormation`.`idUtilisateur` = :idUtilisateur;
STR;
        $attrFormation = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $searchFormation = $this->db->run( $stmtFormation, $attrFormation );
        $this->user[ 'formation' ] = array(
             'intitule' => $searchFormation[ 0 ][ 'intituleFormation' ],
            'composante' => $searchFormation[ 0 ][ 'nomComposante' ],
            'adresse' => $searchFormation[ 0 ][ 'adComposante' ],
            'cp' => $searchFormation[ 0 ][ 'cpComposante' ],
            'ville' => $searchFormation[ 0 ][ 'villeComposante' ] 
        );
    }
    private function getMaitreApprentissage() {
        $stmtMaitreApprentissage = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idMaitreApprentissage` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idApprenti` = :idUtilisateur;
STR;
        $attrMaitreApprentissage = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $searchMaitreApprentissage = $this->db->run( $stmtMaitreApprentissage, $attrMaitreApprentissage );
        $stmtEntreprise = <<<STR
                SELECT * FROM `Entreprise`
                INNER JOIN `RattachementEntreprise`
                ON `RattachementEntreprise`.`idEntreprise` = `Entreprise`.`idEntreprise`
                WHERE `RattachementEntreprise`.`idMaitreApprentissage` = :idMaitreApprentissage;
STR;
        $attrEntreprise = array(
             ":idMaitreApprentissage" => $searchMaitreApprentissage[ 0 ][ 'idMaitreApprentissage' ] 
        );
        $searchEntreprise = $this->db->run( $stmtEntreprise, $attrEntreprise );
        $this->user[ 'maitreapprentissage' ] = array(
             'nom' => $searchMaitreApprentissage[ 0 ][ 'nom' ],
            'prenom' => $searchMaitreApprentissage[ 0 ][ 'prenom' ],
            'tel' => $searchMaitreApprentissage[ 0 ][ 'tel' ],
            'port' => $searchMaitreApprentissage[ 0 ][ 'port' ],
            'email' => $searchMaitreApprentissage[ 0 ][ 'email' ],
            'fonction' => $searchEntreprise[ 0 ][ 'fonction' ] 
        );
        $this->user[ 'entreprise' ] = array(
             'raisonsociale' => $searchEntreprise[ 0 ][ 'raisonSocialeEntreprise' ],
            'adresse' => $searchEntreprise[ 0 ][ 'adEntreprise' ],
            'cp' => $searchEntreprise[ 0 ][ 'cpEntreprise' ],
            'ville' => $searchEntreprise[ 0 ][ 'villeEntreprise' ] 
        );
    }
    private function getTuteurPedagogique() {
        $stmt = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idTuteurPedagogique` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idApprenti` = :idUtilisateur;
STR;
        $attr = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $search = $this->db->run( $stmt, $attr );
        $this->user[ 'tuteurpedagogique' ] = array(
             'nom' => $search[ 0 ][ 'nom' ],
            'prenom' => $search[ 0 ][ 'prenom' ],
            'tel' => $search[ 0 ][ 'tel' ],
            'port' => $search[ 0 ][ 'port' ],
            'email' => $search[ 0 ][ 'email' ] 
        );
    }
}
final class maitreapprentissage extends user {
    public function __construct( $db, $id ) {
        parent::__construct( $db, $id );
        $this->getEntreprise();
        $this->getApprenti();
        $this->getTuteurPedagogique();
    }
    //Getters
    private function getEntreprise() {
        $stmt = <<<STR
                SELECT * FROM `Entreprise`
                INNER JOIN `RattachementEntreprise`
                ON `RattachementEntreprise`.`idEntreprise` = `Entreprise`.`idEntreprise`
                WHERE `RattachementEntreprise`.`idMaitreApprentissage` = :idUtilisateur;
STR;
        $attr = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $search = $this->db->run( $stmt, $attr );
        $this->user[ 'user' ][ 'fonction' ] = $search[ 0 ][ 'fonction' ];
        $this->user[ 'entreprise' ] = array(
             'raisonsociale' => $search[ 0 ][ 'raisonSocialeEntreprise' ],
            'adresse' => $search[ 0 ][ 'adEntreprise' ],
            'cp' => $search[ 0 ][ 'cpEntreprise' ],
            'ville' => $search[ 0 ][ 'villeEntreprise' ] 
        );
    }
    private function getApprenti() {
        $stmtApprenti = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idApprenti` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idMaitreApprentissage` = :idUtilisateur;
STR;
        $attrApprenti = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $searchApprenti = $this->db->run( $stmtApprenti, $attrApprenti );
        $stmtFormation = <<<STR
                SELECT * FROM `Composante`
                INNER JOIN (`Formation`
                    INNER JOIN `RattachementFormation`
                    ON `RattachementFormation`.`idFormation` = `Formation`.`idFormation`
                ) ON `Formation`.`idComposante` = `Composante`.`idComposante`
                WHERE `RattachementFormation`.`idUtilisateur` = :idUtilisateur;
STR;
        $attrFormation = array(
             ":idUtilisateur" => $searchApprenti[ 0 ][ 'idApprenti' ] 
        );
        $searchFormation = $this->db->run( $stmtFormation, $attrFormation );
        $this->user[ 'apprenti' ] = array(
             'nom' => $searchApprenti[ 0 ][ 'nom' ],
            'prenom' => $searchApprenti[ 0 ][ 'prenom' ],
            'tel' => $searchApprenti[ 0 ][ 'tel' ],
            'port' => $searchApprenti[ 0 ][ 'port' ],
            'email' => $searchApprenti[ 0 ][ 'email' ],
            'formation' => $searchFormation[ 0 ][ 'intituleFormation' ],
            'composante' => $searchFormation[ 0 ][ 'nomComposante' ] 
        );
    }
    private function getTuteurPedagogique() {
        $stmt = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idTuteurPedagogique` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idMaitreApprentissage` = :idUtilisateur;
STR;
        $attr = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $search = $this->db->run( $stmt, $attr );
        $this->user[ 'tuteurpedagogique' ] = array(
             'nom' => $search[ 0 ][ 'nom' ],
            'prenom' => $search[ 0 ][ 'prenom' ],
            'tel' => $search[ 0 ][ 'tel' ],
            'port' => $search[ 0 ][ 'port' ],
            'email' => $search[ 0 ][ 'email' ] 
        );
    }
}
final class tuteurpedagogique extends user {
    public function __construct( $db, $id ) {
        parent::__construct( $db, $id );
        $this->getTuteurPedagogique();
        $this->getApprenti();
        $this->getMaitreApprentissage();
    }
    //Getters
    private function getTuteurPedagogique() {
        $stmtFormation = <<<STR
                SELECT * FROM `Composante`
                INNER JOIN (`Formation`
                    INNER JOIN `RattachementFormation`
                    ON `RattachementFormation`.`idFormation` = `Formation`.`idFormation`
                ) ON `Formation`.`idComposante` = `Composante`.`idComposante`
                WHERE `RattachementFormation`.`idUtilisateur` = :idUtilisateur;
STR;
        $attrFormation = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $searchFormation = $this->db->run( $stmtFormation, $attrFormation );
        $this->user[ 'formation' ] = array(
             'intitule' => $searchFormation[ 0 ][ 'intituleFormation' ],
            'composante' => $searchFormation[ 0 ][ 'nomComposante' ],
            'adresse' => $searchFormation[ 0 ][ 'adComposante' ],
            'cp' => $searchFormation[ 0 ][ 'cpComposante' ],
            'ville' => $searchFormation[ 0 ][ 'villeComposante' ] 
        );
    }
    private function getApprenti() {
        $stmt = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idApprenti` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idTuteurPedagogique` = :idUtilisateur;
STR;
        $attr = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $search = $this->db->run( $stmt, $attr );
        $this->user[ 'apprenti' ] = array(
             'nom' => $search[ 0 ][ 'nom' ],
            'prenom' => $search[ 0 ][ 'prenom' ],
            'tel' => $search[ 0 ][ 'tel' ],
            'port' => $search[ 0 ][ 'port' ],
            'email' => $search[ 0 ][ 'email' ] 
        );
    }
    private function getMaitreApprentissage() {
        $stmtMaitreApprentissage = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idMaitreApprentissage` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idTuteurPedagogique` = :idUtilisateur;
STR;
        $attrMaitreApprentissage = array(
             ":idUtilisateur" => $this->user[ 'user' ][ 'id' ] 
        );
        $searchMaitreApprentissage = $this->db->run( $stmtMaitreApprentissage, $attrMaitreApprentissage );
        $stmtEntreprise = <<<STR
                SELECT * FROM `Entreprise`
                INNER JOIN `RattachementEntreprise`
                ON `RattachementEntreprise`.`idEntreprise` = `Entreprise`.`idEntreprise`
                WHERE `RattachementEntreprise`.`idMaitreApprentissage` = :idMaitreApprentissage;
STR;
        $attrEntreprise = array(
             ":idMaitreApprentissage" => $searchMaitreApprentissage[ 0 ][ 'idMaitreApprentissage' ] 
        );
        $searchEntreprise = $this->db->run( $stmtEntreprise, $attrEntreprise );
        $this->user[ 'maitreapprentissage' ] = array(
             'nom' => $searchMaitreApprentissage[ 0 ][ 'nom' ],
            'prenom' => $searchMaitreApprentissage[ 0 ][ 'prenom' ],
            'tel' => $searchMaitreApprentissage[ 0 ][ 'tel' ],
            'port' => $searchMaitreApprentissage[ 0 ][ 'port' ],
            'email' => $searchMaitreApprentissage[ 0 ][ 'email' ],
            'fonction' => $searchEntreprise[ 0 ][ 'fonction' ] 
        );
        $this->user[ 'entreprise' ] = array(
             'raisonsociale' => $searchEntreprise[ 0 ][ 'raisonSocialeEntreprise' ],
            'adresse' => $searchEntreprise[ 0 ][ 'adEntreprise' ],
            'cp' => $searchEntreprise[ 0 ][ 'cpEntreprise' ],
            'ville' => $searchEntreprise[ 0 ][ 'villeEntreprise' ] 
        );
    }
}
?>