<?php
	abstract class User {
		protected $login; protected $name; protected $mail; protected $tel; protected $cell;

		public function $__construct($pLogin, $pName, $pMail, $pTel, $pCell) {
			$this->login = $pLogin;
			$this->name = $pName;
			$this->mail = $pMail;
			$this->tel = $pTel;
			$this->cell = $pCell;
		}

		public function $getLogin() {
			return $this->login;
		}
		public function $getName() {
			return $this->name;
		}
		public function $getMail() {
			return $this->mail;
		}
		public function $getTel() {
			return $this->tel;
		}
		public function $getCell() {
			return $this->cell;
		}
	}

	class Apprenti extends User {
		private $_formation; private $_idMaitreApprentissage; private $_idTuteurPedagogique;

		public function $affichageAccueil($pDb) {
			echo "<h2>Formation actuelle</h2><p>$this->_formation</p><h2>Entreprise</h2><p>";

			try {
				$query = $database->query("SELECT `entreprise`.`raisonSocialeEntreprise`,`maitreapprentissage`.`prenomMaitreApprentissage`, `maitreapprentissage`.`nomMaitreApprentissage` FROM `entreprise` INNER JOIN `maitreapprentissage` ON `entreprise`.`idEntreprise`=`maitreapprentissage`.`idEntreprise` WHERE `maitreapprentissage`.`idMaitreApprentissage`=$_idMaitreApprentissage;");
				$answer = $query->fetchAll();
			}

			catch(PDOException $e) {
				$e->getMessage();
			}

			if (count($answer) == 1) {
				echo $answer[0]['raisonSocialeEntreprise'] . "</p><h2>Maître d'apprentissage</h2><p>" . $answer[0]['prenomMaitreApprentissage'] . " " . $answer[0]['nomMaitreApprentissage'] . "</p><h2>Tuteur pédagogique</h2><p>";
			}

			try {
				$query = $database->query("SELECT `tuteurpedagogique`.`prenomTuteurPedagogique`,``tuteurpedagogique`.`nomTuteurPedagogique` FROM `tuteurpedagogique` WHERE `tuteurpedagogique`.`idTuteurPedagogique`=$_idTuteurPedagogique;");
				$answer = $query->fetchAll();
			}

			catch(PDOException $e) {
				$e->getMessage();
			}

			if (count($answer) == 1) {
				echo $answer[0]['prenomTuteurPedagogique'] . " " . $answer[0]['nomTuteurPedagogique'] . "</p>";
			}
		}
	}
?>
