<?php
    require_once 'db.class.php';
    abstract class user {
        protected $db; protected $user=array();
        protected function __construct($db, $id) {
            $this->initDb($db);
            $search = $this->db->select("Utilisateur", "idUtilisateur = ". $id);
            $this->user['user'] = array(
                'id' => $search[0]['idUtilisateur'],
                'login' => $search[0]['login'],
                'nom' => $search[0]['nom'],
                'prenom' => $search[0]['prenom'],
                'tel' => $search[0]['tel'],
                'port' => $search[0]['port'],
                'email' => $search[0]['email']
            );
        }
        private function initDb($db) {
            $this->db = new db("mysql:host=" . $db["host"] . ";port=" . $db["port"] . ";dbname=" . $db["name"], $db["user"], $db["pass"]);
        }
        public function getUser() {
            return $this->user;
        }
    }
    final class apprenti extends user {
        public function __construct($db, $id) {
            parent::__construct($db, $id);
            $this->aboutApprenti();
            $this->aboutMaitreApprentissage();
            $this->aboutTuteurPedagogique();
        }
        private function aboutApprenti() { 
            $searchApprenti = $this->db->select("InfosApprenti", "idApprenti = " . $this->user['user']['id']);
            $this->user['user']['adresse'] = $searchApprenti[0]['adApprenti'];
            $this->user['user']['cp'] = $searchApprenti[0]['cpApprenti'];
            $this->user['user']['ville'] = $searchApprenti[0]['villeApprenti'];
            $stmtFormation = <<<STR
    SELECT * FROM `Composante`
    INNER JOIN (`Formation`
        INNER JOIN `RattachementFormation`
        ON `RattachementFormation`.`idFormation` = `Formation`.`idFormation`
    ) ON `Formation`.`idComposante` = `Composante`.`idComposante`
    WHERE `RattachementFormation`.`idUtilisateur` = :idUtilisateur;
STR;
            $attrFormation = array(
                ":idUtilisateur"=> $this->user['user']['id']
            );
           $searchFormation = $this->db->run($stmtFormation, $attrFormation);
           $this->user['formation'] = array(
               'intitule' => $searchFormation[0]['intituleFormation'],
               'composante' => $searchFormation[0]['nomComposante'],
               'adresse' => $searchFormation[0]['adComposante'],
               'cp' => $searchFormation[0]['cpComposante'],
               'ville' => $searchFormation[0]['villeComposante']
           );
        }
        private function aboutMaitreApprentissage() {
            $stmtMaitreApprentissage = <<<STR
    SELECT * FROM `ContratApprentissage`
    INNER JOIN `Utilisateur`
    ON `ContratApprentissage`.`idMaitreApprentissage` = `Utilisateur`.`idUtilisateur`
    WHERE `ContratApprentissage`.`idApprenti` = :idUtilisateur;
STR;
            $attrMaitreApprentissage = array(
                ":idUtilisateur" => $this->user['user']['id']
            );
            $searchMaitreApprentissage = $this->db->run($stmtMaitreApprentissage, $attrMaitreApprentissage);
            $stmtEntreprise = <<<STR
    SELECT * FROM `Entreprise`
    INNER JOIN `RattachementEntreprise`
    ON `RattachementEntreprise`.`idEntreprise` = `Entreprise`.`idEntreprise`
    WHERE `RattachementEntreprise`.`idMaitreApprentissage` = :idMaitreApprentissage;
STR;
            $attrEntreprise = array(
                ":idMaitreApprentissage" => $searchMaitreApprentissage[0]['idMaitreApprentissage']
            );
            $searchEntreprise = $this->db->run($stmtEntreprise, $attrEntreprise);
            $this->user['maitreapprentissage'] = array(
                'nom' => $searchMaitreApprentissage[0]['nom'],
                'prenom' => $searchMaitreApprentissage[0]['prenom'],
                'tel' => $searchMaitreApprentissage[0]['tel'],
                'port' => $searchMaitreApprentissage[0]['port'],
                'email' => $searchMaitreApprentissage[0]['email'],
                'fonction' => $searchEntreprise[0]['fonction']
            );
            $this->user['entreprise'] = array(
                'raisonsociale' => $searchEntreprise[0]['raisonSocialeEntreprise'],
                'adresse' => $searchEntreprise[0]['adEntreprise'],
                'cp' => $searchEntreprise[0]['cpEntreprise'],
                'ville' => $searchEntreprise[0]['villeEntreprise']
            );
        }
        private function aboutTuteurPedagogique() {
            $stmtTuteurPedagogique = <<<STR
    SELECT * FROM `ContratApprentissage`
    INNER JOIN `Utilisateur`
    ON `ContratApprentissage`.`idTuteurPedagogique` = `Utilisateur`.`idUtilisateur`
    WHERE `ContratApprentissage`.`idApprenti` = :idUtilisateur;
STR;
            $attrTuteurPedagogique = array(
                ":idUtilisateur" => $this->user['user']['id']
            );
            $searchTuteurPedagogique = $this->db->run($stmtTuteurPedagogique, $attrTuteurPedagogique);
            $this->user['tuteurpedagogique'] = array(
                'nom' => $searchTuteurPedagogique[0]['nom'],
                'prenom' => $searchTuteurPedagogique[0]['prenom'],
                'tel' => $searchTuteurPedagogique[0]['tel'],
                'port' => $searchTuteurPedagogique[0]['port'],
                'email' => $searchTuteurPedagogique[0]['email']
            );
        }
    }
    final class maitreapprentissage extends user {
        public function __construct($db, $id) {
            parent::__construct($db, $id);
            /* $this->aboutMaitreApprentissage();
            $this->aboutEntreprise();
            $this->aboutApprenti();
            $this->aboutTuteurPedagogique(); */
        }
        /* private function aboutMaitreApprentissage() {
            
        }
        private function aboutEntreprise() {
            
        }
        private function aboutApprenti() {
            
        }
        private function aboutTuteurPedagogique() {
            
        } */
    }
    final class tuteurpedagogique extends user {
        public function __construct($db, $id) {
            parent::__construct($db, $id);
            /* $this->aboutTuteurPedagogique();
            $this->aboutApprenti();
            $this->aboutMaitreApprentissage();
            $this->aboutEntreprise(); */
        }
        /* private function aboutTuteurPedagogique() {
            
        }
        private function aboutApprenti() {
            
        }
        private function aboutMaitreApprentissage() {
            
        }
        private function aboutEntreprise() {
            
        } */
    }
?>

