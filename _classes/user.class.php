<?php
	abstract class User {
		protected $userBasicInfos;
		public function __construct($pLogin, $pName, $pEmail, $pTel, $pCell) {
			$this->userBasicInfos = array(
				'login' => $pLogin,
				'name' => $pName,
				'email' => $pEmail,
				'tel' => $pTel,
				'cell' => $pCell);
		}
		public function getLogin() {
			return $this->userBasicInfos['login'];
		}
		public function getName() {
			return $this->userBasicInfos['name'];
		}
		public function getEmail() {
			return $this->userBasicInfos['email'];
		}
		public function getTel() {
			return $this->userBasicInfos['tel'];
		}
		public function getCell() {
			return $this->userBasicInfos['cell'];
		}
	}
	final class Apprenti extends User {
		private $_apprentiMaitreApprentissage; private $_apprentiCompany; private $_apprentiTuteurPedagogique;
		public function getMaitreApprentissageInfos() {
			return $this->_apprentiMaitreApprentissage;
		}
		public function getCompanyInfos() {
			return $this->_apprentiCompany;
		}
		public function getTuteurPedagogiqueInfos() {
			return $this->_apprentiTuteurPedagogique;
		}
		public function whoIsMaitreApprentissage($pDatabase) {
			$answer = dbSelect("SELECT * FROM `Entreprise` INNER JOIN (`MaitreApprentissage` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `MaitreApprentissage`.`idMaitreApprentissage`=`ContratApprentissage`.`idMaitreApprentissage`) ON `Entreprise`.`idEntreprise`=`MaitreApprentissage`.`idEntreprise` WHERE `Apprenti`.`loginApprenti`='" . $this->userBasicInfos['login'] . "';",$pDatabase);
			if (count($answer) == 1) {
				$this->_apprentiMaitreApprentissage = array(
					'nameMaitreApprentissage' => $answer[0]['prenomMaitreApprentissage'] . ' ' . $answer[0]['nomMaitreApprentissage'],
					'functionMaitreApprentissage' => $answer[0]['fonctionMaitreApprentissage'],
					'mailMaitreApprentissage' => $answer[0]['mailMaitreApprentissage'],
					'telMaitreApprentissage' => $answer[0]['telMaitreApprentissage'],
					'cellMaitreApprentissage' => $answer[0]['portMaitreApprentissage']);
				$this->_apprentiCompany = array(
					'companyName' => $answer[0]['raisonSocialeEntreprise'],
					'companyAdress' => $answer[0]['adEntreprise'] . '<br />' . $answer[0]['compAdEntreprise'] . '<br />' . $answer[0]['cpEntreprise'] . ' ' . $answer[0]['villeEntreprise']);
			}
		}
		public function whoIsTuteurPedagogique($pDatabase) {
			$answer = dbSelect("SELECT * FROM `TuteurPedagogique` INNER JOIN (`ContratApprentissage` INNER JOIN `Apprenti` ON `ContratApprentissage`.`idApprenti`=`Apprenti`.`idApprenti`) ON `TuteurPedagogique`.`idTuteurPedagogique`=`ContratApprentissage`.`idTuteurPedagogique` WHERE `Apprenti`.`loginApprenti`='" . $this->userBasicInfos['login'] . "';",$pDatabase);
			if (count($answer) == 1) {
				$this->_apprentiTuteurPedagogique = array(
					'nameTuteurPedagogique' => $answer[0]['prenomTuteurPedagogique'] . ' ' . $answer[0]['nomTuteurPedagogique'],
					'mailTuteurPedagogique' => $answer[0]['mailTuteurPedagogique'],
					'telTuteurPedagogique' => $answer[0]['telTuteurPedagogique'],
					'cellTuteurPedagogique' => $answer[0]['portTuteurPedagogique']);
			}
		}
	}
?>
