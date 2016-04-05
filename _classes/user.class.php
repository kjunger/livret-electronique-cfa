<?php
	class User {
		protected $login; protected $name; protected $email; protected $tel; protected $cell; protected $type;

		public function __construct($pLogin, $pName, $pEmail, $pTel, $pCell, $pType) {
			$this->login = $pLogin;
			$this->name = $pName;
			$this->email = $pEmail;
			$this->tel = $pTel;
			$this->cell = $pCell;
		}

		public function getLogin() {
			return $this->login;
		}
		public function getName() {
			return $this->name;
		}
		public function getEmail() {
			return $this->email;
		}
		public function getTel() {
			return $this->tel;
		}
		public function getCell() {
			return $this->cell;
		}
		public function getType() {
			return $this->type;
		}
	}
?>
