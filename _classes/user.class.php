<?php
    abstract class User

    {
        protected $userBasicInfos;
        public

        function __construct($pLogin, $pName, $pEmail, $pTel, $pCell)
        {
            $this->userBasicInfos = array(
                'login' => $pLogin,
                'name' => $pName,
                'email' => $pEmail,
                'tel' => $pTel,
                'cell' => $pCell
            );
        }

        public

        function getUserBasicInfos()
        {
            return $this->userBasicInfos;
        }
    }

    final class Apprenti extends User

    {
        private $_apprentiMaitreApprentissage;
        private $_apprentiCompany;
        private $_apprentiTuteurPedagogique;
        private $_apprentiFormation;
        public

        function whoIsMaitreApprentissage($pDatabase)
        {
            $answer = dbSelect("SELECT * FROM `Entreprise` INNER JOIN (`MaitreApprentissage` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `MaitreApprentissage`.`idMaitreApprentissage`=`ContratApprentissage`.`idMaitreApprentissage`) ON `Entreprise`.`idEntreprise`=`MaitreApprentissage`.`idEntreprise` WHERE `Apprenti`.`loginApprenti`='" . $this->userBasicInfos['login'] . "';", $pDatabase);
            if (count($answer) == 1)
            {
                $this->_apprentiMaitreApprentissage = array(
                    'nameMaitreApprentissage' => $answer[0]['prenomMaitreApprentissage'] . ' ' . $answer[0]['nomMaitreApprentissage'],
                    'functionMaitreApprentissage' => $answer[0]['fonctionMaitreApprentissage'],
                    'mailMaitreApprentissage' => $answer[0]['mailMaitreApprentissage'],
                    'telMaitreApprentissage' => $answer[0]['telMaitreApprentissage'],
                    'cellMaitreApprentissage' => $answer[0]['portMaitreApprentissage']
                );
                $this->_apprentiCompany = array(
                    'companyName' => $answer[0]['raisonSocialeEntreprise'],
                    'companyAdress' => $answer[0]['adEntreprise'] . '<br />' . $answer[0]['compAdEntreprise'] . '<br />' . $answer[0]['cpEntreprise'] . ' ' . $answer[0]['villeEntreprise']
                );
            }
        }

        public

        function whoIsTuteurPedagogique($pDatabase)
        {
            $answer = dbSelect("SELECT * FROM `TuteurPedagogique` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `TuteurPedagogique`.`idTuteurPedagogique`=`ContratApprentissage`.`idTuteurPedagogique` WHERE `Apprenti`.`loginApprenti`='" . $this->userBasicInfos['login'] . "';", $pDatabase);
            if (count($answer) == 1)
            {
                $this->_apprentiTuteurPedagogique = array(
                    'nameTuteurPedagogique' => $answer[0]['prenomTuteurPedagogique'] . ' ' . $answer[0]['nomTuteurPedagogique'],
                    'mailTuteurPedagogique' => $answer[0]['mailTuteurPedagogique'],
                    'telTuteurPedagogique' => $answer[0]['telTuteurPedagogique'],
                    'cellTuteurPedagogique' => $answer[0]['portTuteurPedagogique']
                );
            }
        }

        public

        function aboutFormation($pDatabase)
        {
            $answerNameFormation = dbSelect("SELECT * FROM `Formation` INNER JOIN `Apprenti` ON `Formation`.`idFormation`=`Apprenti`.`idFormation` WHERE `Apprenti`.`loginApprenti`='" . $this->userBasicInfos['login'] . "';", $pDatabase);
            $answerAboutComposante = dbSelect("SELECT * FROM `Composante` INNER JOIN `Formation` ON `Composante`.`idComposante`=`Formation`.`idComposante` WHERE `Formation`.`idFormation`=" . $answerNameFormation[0]['idFormation'] . ";", $pDatabase);
            $answerWhoIsRepresentantPedagogique = dbSelect("SELECT * FROM `RepresentantPedagogique` INNER JOIN `Formation` ON `RepresentantPedagogique`.`idRepresentantPedagogique`=`Formation`.`idRepresentantPedagogique` WHERE `Formation`.`idFormation`=" . $answerNameFormation[0]['idFormation'] . ";", $pDatabase);
            if (count($answerNameFormation) == 1 && count($answerAboutComposante) == 1 && count($answerWhoIsRepresentantPedagogique) == 1)
            {
                $this->_apprentiFormation = array(
                    'nameFormation' => $answerNameFormation[0]['intituleFormation'],
                    'nameComposante' => $answerAboutComposante[0]['nomComposante'],
                    'nameRepresentantPedagogique' => $answerWhoIsRepresentantPedagogique[0]['prenomRepresentantPedagogique'] . ' ' . $answerWhoIsRepresentantPedagogique[0]['nomRepresentantPedagogique'],
                    'mailRepresentantPedagogique' => $answerWhoIsRepresentantPedagogique[0]['mailRepresentantPedagogique'],
                    'telRepresentantPedagogique' => $answerWhoIsRepresentantPedagogique[0]['telRepresentantPedagogique'],
                    'cellRepresentantPedagogique' => $answerWhoIsRepresentantPedagogique[0]['portRepresentantPedagogique']
                );
            }
        }

        public

        function getMaitreApprentissageInfos()
        {
            return $this->_apprentiMaitreApprentissage;
        }

        public

        function getCompanyInfos()
        {
            return $this->_apprentiCompany;
        }

        public

        function getTuteurPedagogiqueInfos()
        {
            return $this->_apprentiTuteurPedagogique;
        }

        public

        function getFormationInfos()
        {
            return $this->_apprentiFormation;
        }
    }

    final class MaitreApprentissage extends User

    {
        private $_maitreApprentissageApprenti;
        private $_maitreApprentissageCompany;
        private $_maitreApprentissageTuteurPedagogique;
        public

        function whoIsApprenti($pDatabase)
        {
            $answer = dbSelect("SELECT * FROM `Apprenti` INNER JOIN (`ContratApprentissage` INNER JOIN `MaitreApprentissage` ON `ContratApprentissage`.`idMaitreApprentissage`=`MaitreApprentissage`.`idMaitreApprentissage`) ON `Apprenti`.`idApprenti`=`ContratApprentissage`.`idApprenti` WHERE `MaitreApprentissage`.`loginMaitreApprentissage`='" . $this->userBasicInfos['login'] . "';", $pDatabase);
            if (count($answer) == 1)
            {
                $this->_maitreApprentissageApprenti = array(
                    'nameApprenti' => $answer[0]['prenomApprenti'] . ' ' . $answer[0]['nomApprenti'],
                    'mailApprenti' => $answer[0]['mailApprenti'],
                    'telApprenti' => $answer[0]['telApprenti'],
                    'cellApprenti' => $answer[0]['portApprenti']
                );
            }
        }

        public

        function whoIsTuteurPedagogique($pDatabase)
        {
            $answer = dbSelect("SELECT * FROM `TuteurPedagogique` INNER JOIN (`ContratApprentissage` INNER JOIN `MaitreApprentissage` ON `ContratApprentissage`.`idMaitreApprentissage`=`MaitreApprentissage`.`idMaitreApprentissage`) ON `TuteurPedagogique`.`idTuteurPedagogique`=`ContratApprentissage`.`idTuteurPedagogique` WHERE `MaitreApprentissage`.`loginMaitreApprentissage`='" . $this->userBasicInfos['login'] . "';", $pDatabase);
            if (count($answer) == 1)
            {
                $this->_maitreApprentissageTuteurPedagogique = array(
                    'nameTuteurPedagogique' => $answer[0]['prenomTuteurPedagogique'] . ' ' . $answer[0]['nomTuteurPedagogique'],
                    'mailTuteurPedagogique' => $answer[0]['mailTuteurPedagogique'],
                    'telTuteurPedagogique' => $answer[0]['telTuteurPedagogique'],
                    'cellTuteurPedagogique' => $answer[0]['portTuteurPedagogique']
                );
            }
        }

        public

        function aboutCompany($pDatabase)
        {
            $answer = dbSelect("SELECT * FROM `Entreprise` INNER JOIN `MaitreApprentissage` ON `Entreprise`.`idEntreprise`=`MaitreApprentissage`.`idEntreprise` WHERE `MaitreApprentissage`.`loginMaitreApprentissage`='" . $this->userBasicInfos['login'] . "';", $pDatabase);
            if (count($answer) == 1)
            {
                $this->_maitreApprentissageCompany = array(
                    'companyName' => $answer[0]['raisonSocialeEntreprise'],
                    'companyAdress' => $answer[0]['adEntreprise'] . '<br />' . $answer[0]['compAdEntreprise'] . '<br />' . $answer[0]['cpEntreprise'] . ' ' . $answer[0]['villeEntreprise']
                );
            }
        }

        public

        function getApprentiInfos()
        {
            return $this->_maitreApprentissageApprenti;
        }

        public

        function getTuteurPedagogiqueInfos()
        {
            return $this->_maitreApprentissageTuteurPedagogique;
        }

        public

        function getCompanyInfos()
        {
            return $this->_maitreApprentissageCompany;
        }
    }

    final class TuteurPedagogique extends User

    {
        private $_tuteurPedagogiqueApprenti;
        private $_tuteurMaitreApprentissage;
        public

        function whoIsApprenti($pDatabase)
        {
            $answer = dbSelect("SELECT * FROM `Apprenti` INNER JOIN (`ContratApprentissage` INNER JOIN `TuteurPedagogique` ON `ContratApprentissage`.`idTuteurPedagogique`=`TuteurPedagogique`.`idTuteurPedagogique`) ON `Apprenti`.`idApprenti`=`ContratApprentissage`.`idApprenti` WHERE `TuteurPedagogique`.`loginTuteurPedagogique`='" . $this->userBasicInfos['login'] . "';", $pDatabase);
            if (count($answer) == 1)
            {
                $this->_tuteurPedagogiqueApprenti = array(
                    'nameApprenti' => $answer[0]['prenomApprenti'] . ' ' . $answer[0]['nomApprenti'],
                    'mailApprenti' => $answer[0]['mailApprenti'],
                    'telApprenti' => $answer[0]['telApprenti'],
                    'cellApprenti' => $answer[0]['portApprenti']
                );
            }
        }

        public

        function whoIsMaitreApprentissage($pDatabase)
        {
            $answer = dbSelect("SELECT * FROM `MaitreApprentissage` INNER JOIN (`ContratApprentissage` INNER JOIN `TuteurPedagogique` ON `ContratApprentissage`.`idTuteurPedagogique`=`TuteurPedagogique`.`idTuteurPedagogique`) ON `MaitreApprentissage`.`idMaitreApprentissage`=`ContratApprentissage`.`idMaitreApprentissage` WHERE `TuteurPedagogique`.`loginTuteurPedagogique`='" . $this->userBasicInfos['login'] . "';", $pDatabase);
            if (count($answer) == 1)
            {
                $this->_tuteurMaitreApprentissage = array(
                    'nameMaitreApprentissage' => $answer[0]['prenomMaitreApprentissage'] . ' ' . $answer[0]['nomMaitreApprentissage'],
                    'mailMaitreApprentissage' => $answer[0]['mailMaitreApprentissage'],
                    'telMaitreApprentissage' => $answer[0]['telMaitreApprentissage'],
                    'cellMaitreApprentissage' => $answer[0]['portMaitreApprentissage']
                );
            }
        }

        public

        function getApprentiInfos()
        {
            return $this->_tuteurPedagogiqueApprenti;
        }

        public

        function getMaitreApprentissageInfos()
        {
            return $this->_tuteurMaitreApprentissage;
        }
    }

?>
