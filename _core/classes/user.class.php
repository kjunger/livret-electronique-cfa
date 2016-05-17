<?php

/*
 * CLASSE USER
 * POUR LA GESTION DES UTILISATEURS
 * --Description:
 * --Chaque type d'utilisateurs dérive d'une même classe abstraite "user"
 * --disposant des méthodes de base communes à chaque type (initialisation de la
 * --base de données, récupération des informations de base de l'utilisateur,
 * --vérification du mot de passe...). Toutefois, le constructeur de la classe
 * --abstraite ne peut être appellé (car impossible d'instancier un objet
 * --à partir d'une classe abstraite) ; chaque objet créé doit être un instance
 * --d'une classe fille de la classe abstraite, et chaque classe fille doit
 * --posséder son propre constructeur avec au moins les mêmes paramètres que le
 * --constructeur parent, contenant un appel à ce même constucteur parent
 * --(celui de la classe abstraite) suivi de ses propres instructions,
 * --comme dans cet exemple simple de classe fille :
 * final class classe_fille extends user {
 *      public function __construct($db, $id) {
 *          parent::__construct($db,$id);
 *          //Autres instructions propres au constructeur de la classe fille
 *      }
 * }
 */

require_once 'db.class.php';    //La classe db est requise pour instancier et gérer la base de données

abstract class user             //Classe abstraite user, dont dérive toutes les filles.
{
    //Variables de la classe, dont bénéficient ses filles
    protected $db;              //Stocke une instance de base de données
    protected $user = array();  //Tableau associatif pour stocker les informations de l'utilisateur

    //Constructeur de la classe abstraite user
    protected function __construct($db, $id)
    {
        $this->initDb($db);     //Instanciation et stockage d'une connexion à la base de données
        $this->initUser($id);   //Récupération et stockage des informations de base pour l'utilisateur
    }

    //Méthodes de la classe user (héritées par chaque classe fille)
    private function initDb($db)    //Pour instancier et stocker un base de données, avec en paramètre un tableau associatif contenant les informations de connexion à celle-ci
    {
        $this->db = new db("mysql:host=" . $db["host"] . ";port=" . $db["port"] . ";dbname=" . $db["name"], $db["user"], $db["pass"]);  //Instanciation d'un objet de classe db
        $this->db->setErrorCallbackFunction("echo");    //Paramétrage de l'affichage des erreurs SQL renvoyées (le cas échéant) par la base de données
        /** Forcer l'encodage des chaînes de caractères en UTF-8 **/
        $stmt = <<<STR
                SET CHARACTER SET utf8;
STR;
        $this->db->run($stmt);
        /*****/
    }
    private function initUser($id)  //Pour récupérer et stocker les données de base de l'utilisateur
    {
        $search = $this->db->select("Utilisateur", "idUtilisateur = " . $id);   //Exécution d'une requête SELECT sur la base de données
        $this->user['user'] = array(    //Stockage des résultats dans le tableau associatif $user
            'id' => $search[0]['idUtilisateur'],
            'login' => $search[0]['login'],
            'nom' => $search[0]['nom'],
            'prenom' => $search[0]['prenom'],
            'tel' => $search[0]['tel'],
            'port' => $search[0]['port'],
            'email' => $search[0]['email']
        );
    }
    public function checkPassword($pass)    //Pour vérifier le mot de passe utilisateur (par exemple, si le mot de passe est demandé pour la validation d'un formulaire)
    {
        $search = $this->db->select("Utilisateur", "idUtilisateur = " . $this->user['user']['id']); //Récupération des infos utilisateur
        if ($search[0]['pass'] == md5($pass)) {     //Si mot de passe stocké dans base == mot de passe saisi
            return true;
        }
        else {      //Si mot de passe incorrect
            return false;
        }
    }
    public function returnUser()    //Retourne le tableau associatif contenant les informations de l'utilisateur
    {
        return $this->user;
    }
    public function returnDb()      //Retourne la base de données associée à l'utilisateur en cours
    {
        return $this->db;
    }
}

/*
 * CLASSES FILLES
 * --Une par type d'utilisateur
 */

final class apprenti extends user
{
    //Constructeur de la classe apprenti
    public function __construct($db, $id)
    {
        parent::__construct($db, $id);      //Appel du constructeur de la classe mère
        $this->getApprenti();               //Récupération des infos supplémentaires de l'apprenti(e)
        $this->getMaitreApprentissage();    //Récupération des infos du maître d'apprentissage associé à l'apprenti(e)
        $this->getTuteurPedagogique();      //Récupération des infos du tuteur pédagogique associé à l'apprenti(e)
    }

    /*
     * GETTERS
     * --Récupère les informations supplémentaires nécessaires à un utilisateur
     * --de type apprenti
     */

    private function getApprenti()
    {
        $searchApprenti = $this->db->select("InfosApprenti", "idApprenti = " . $this->user['user']['id']);
        $searchIdContrat = $this->db->select("ContratApprentissage", "idApprenti = " . $this->user['user']['id']);
        $this->user['user']['adresse'] = $searchApprenti[0]['adApprenti'];
        $this->user['user']['cp'] = $searchApprenti[0]['cpApprenti'];
        $this->user['user']['ville'] = $searchApprenti[0]['villeApprenti'];
        $this->user['user']['idcontrat'] = $searchIdContrat[0]['idContratApprentissage'];
        $stmtFormation = <<<STR
                SELECT * FROM `Composante`
                INNER JOIN (`Formation`
                    INNER JOIN `RattachementFormation`
                    ON `RattachementFormation`.`idFormation` = `Formation`.`idFormation`
                ) ON `Formation`.`idComposante` = `Composante`.`idComposante`
                WHERE `RattachementFormation`.`idUtilisateur` = :idUtilisateur;
STR;
        $attrFormation = array(
            ":idUtilisateur" => $this->user['user']['id']
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
    private function getMaitreApprentissage()
    {
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
    private function getTuteurPedagogique()
    {
        $stmt = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idTuteurPedagogique` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idApprenti` = :idUtilisateur;
STR;
        $attr = array(
            ":idUtilisateur" => $this->user['user']['id']
        );
        $search = $this->db->run($stmt, $attr);
        $this->user['tuteurpedagogique'] = array(
            'nom' => $search[0]['nom'],
            'prenom' => $search[0]['prenom'],
            'tel' => $search[0]['tel'],
            'port' => $search[0]['port'],
            'email' => $search[0]['email']
        );
    }
    public function getSignature()

    {
        $search = $this->db->select("ContratApprentissage", "idApprenti = " . $this->user['user']['id'] . " AND idContratApprentissage = " . $this->user['user']['idcontrat']);
        if ($search[0]['dateSignatureApprenti'] != NULL) {
            return true;
        }
        else {
            return false;
        }
    }
    public function setSignature()

    {
        $date = date(Y-m-d);
        $update = array(
            "dateSignatureApprenti" => $date
        );
        $attr = array(
            ":idApprenti" => $this->user['user']['id'],
            ":idContratApprentissage" => $this->user['user']['idcontrat']
        );
        $this->db->update("ContratApprentissage", $update, "idApprenti = :idApprenti AND idContratApprentissage = :idContratApprentissage", $attr);
    }
}
final class maitreapprentissage extends user

{
    public function __construct($db, $id)

    {
        parent::__construct($db, $id);
        $this->getEntreprise();
        $this->getApprenti();
        $this->getTuteurPedagogique();
        $searchIdContrat = $this->db->select("ContratApprentissage", "idMaitreApprentissage = " . $this->user['user']['id']);
        $this->user['user']['idcontrat'] = $searchIdContrat[0]['idContratApprentissage'];
    }
    private function getEntreprise()
    {
        $stmt = <<<STR
                SELECT * FROM `Entreprise`
                INNER JOIN `RattachementEntreprise`
                ON `RattachementEntreprise`.`idEntreprise` = `Entreprise`.`idEntreprise`
                WHERE `RattachementEntreprise`.`idMaitreApprentissage` = :idUtilisateur;
STR;
        $attr = array(
            ":idUtilisateur" => $this->user['user']['id']
        );
        $search = $this->db->run($stmt, $attr);
        $this->user['user']['fonction'] = $search[0]['fonction'];
        $this->user['entreprise'] = array(
            'raisonsociale' => $search[0]['raisonSocialeEntreprise'],
            'adresse' => $search[0]['adEntreprise'],
            'cp' => $search[0]['cpEntreprise'],
            'ville' => $search[0]['villeEntreprise']
        );
    }
    private function getApprenti()
    {
        $stmtApprenti = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idApprenti` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idMaitreApprentissage` = :idUtilisateur;
STR;
        $attrApprenti = array(
            ":idUtilisateur" => $this->user['user']['id']
        );
        $searchApprenti = $this->db->run($stmtApprenti, $attrApprenti);
        $stmtFormation = <<<STR
                SELECT * FROM `Composante`
                INNER JOIN (`Formation`
                    INNER JOIN `RattachementFormation`
                    ON `RattachementFormation`.`idFormation` = `Formation`.`idFormation`
                ) ON `Formation`.`idComposante` = `Composante`.`idComposante`
                WHERE `RattachementFormation`.`idUtilisateur` = :idUtilisateur;
STR;
        $attrFormation = array(
            ":idUtilisateur" => $searchApprenti[0]['idApprenti']
        );
        $searchFormation = $this->db->run($stmtFormation, $attrFormation);
        $this->user['apprenti'] = array(
            'nom' => $searchApprenti[0]['nom'],
            'prenom' => $searchApprenti[0]['prenom'],
            'tel' => $searchApprenti[0]['tel'],
            'port' => $searchApprenti[0]['port'],
            'email' => $searchApprenti[0]['email'],
            'formation' => $searchFormation[0]['intituleFormation'],
            'composante' => $searchFormation[0]['nomComposante']
        );
    }
    private function getTuteurPedagogique()
    {
        $stmt = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idTuteurPedagogique` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idMaitreApprentissage` = :idUtilisateur;
STR;
        $attr = array(
            ":idUtilisateur" => $this->user['user']['id']
        );
        $search = $this->db->run($stmt, $attr);
        $this->user['tuteurpedagogique'] = array(
            'nom' => $search[0]['nom'],
            'prenom' => $search[0]['prenom'],
            'tel' => $search[0]['tel'],
            'port' => $search[0]['port'],
            'email' => $search[0]['email']
        );
    }
    public function getSignature()

    {
        $search = $this->db->select("ContratApprentissage", "idMaitreApprentissage = " . $this->user['user']['id'] . " AND idContratApprentissage = " . $this->user['user']['idcontrat']);
        if ($search[0]['dateSignatureMaitreApprentissage'] != NULL) {
            return true;
        }
        else {
            return false;
        }
    }
    public function setSignature()

    {
        $date = date(Y-m-d);
        $update = array(
            "dateSignatureMaitreApprentissage" => $date
        );
        $attr = array(
            ":idMaitreApprentissage" => $this->user['user']['id'],
            ":idContratApprentissage" => $this->user['user']['idcontrat']
        );
        $this->db->update("ContratApprentissage", $update, "idMaitreApprentissage = :idMaitreApprentissage AND idContratApprentissage = :idContratApprentissage", $attr);
    }
}
final class tuteurpedagogique extends user

{
    public function __construct($db, $id)

    {
        parent::__construct($db, $id);
        $this->getTuteurPedagogique();
        $this->getApprenti();
        $this->getMaitreApprentissage();
    }
    private function getTuteurPedagogique()
    {
        $stmtFormation = <<<STR
                SELECT * FROM `Composante`
                INNER JOIN (`Formation`
                    INNER JOIN `RattachementFormation`
                    ON `RattachementFormation`.`idFormation` = `Formation`.`idFormation`
                ) ON `Formation`.`idComposante` = `Composante`.`idComposante`
                WHERE `RattachementFormation`.`idUtilisateur` = :idUtilisateur;
STR;
        $attrFormation = array(
            ":idUtilisateur" => $this->user['user']['id']
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
    private function getApprenti()
    {
        $stmt = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idApprenti` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idTuteurPedagogique` = :idUtilisateur;
STR;
        $attr = array(
            ":idUtilisateur" => $this->user['user']['id']
        );
        $search = $this->db->run($stmt, $attr);
        $this->user['apprenti'] = array(
            'nom' => $search[0]['nom'],
            'prenom' => $search[0]['prenom'],
            'tel' => $search[0]['tel'],
            'port' => $search[0]['port'],
            'email' => $search[0]['email']
        );
    }
    private function getMaitreApprentissage()
    {
        $stmtMaitreApprentissage = <<<STR
                SELECT * FROM `ContratApprentissage`
                INNER JOIN `Utilisateur`
                ON `ContratApprentissage`.`idMaitreApprentissage` = `Utilisateur`.`idUtilisateur`
                WHERE `ContratApprentissage`.`idTuteurPedagogique` = :idUtilisateur;
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
    public function getSignature()

    {
        $search = $this->db->select("ContratApprentissage", "idTuteurPedagogique = " . $this->user['user']['id'] . " AND idContratApprentissage = " . $this->user['user']['idcontrat']);
        if ($search[0]['dateSignatureTuteurPedagogique'] != NULL) {
            return true;
        }
        else {
            return false;
        }
    }
    public function setSignature()

    {
        $date = date(Y-m-d);
        $update = array(
            "dateSignatureTuteurPedagogique" => $date
        );
        $attr = array(
            ":TuteurPedagogique" => $this->user['user']['id'],
            ":idContratApprentissage" => $this->user['user']['idcontrat']
        );
        $this->db->update("ContratApprentissage", $update, "TuteurPedagogique = :TuteurPedagogique AND idContratApprentissage = :idContratApprentissage", $attr);
    }
}
?>
