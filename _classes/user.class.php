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

		}
	}
?>
