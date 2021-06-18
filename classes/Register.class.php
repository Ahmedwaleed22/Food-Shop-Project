<?php

class Register extends Dbh {
	private $username;
	private $email;
	private $hashedpass;
	private $groupid;

	public function __construct($username, $email, $password, $groupid) {
		$this->username = $username;
		$this->email = $email;
		$this->hashedpass = password_hash($password, PASSWORD_DEFAULT);
		$this->groupid = $groupid;
	}

	public function UsernameExist() {
		/* Checking If Username Already Exists In The Database */
		$usernameCheck = $this->connect()->prepare("SELECT * FROM users WHERE Username = ?");
		$usernameCheck->execute(array($this->username));
		$usernameCount = $usernameCheck->rowCount();

		if ($usernameCount > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function EmailExist() {
		/* Checking If Email Address Already Exists In The Database */
		$emailCheck = $this->connect()->prepare("SELECT * FROM users WHERE Email = ?");
		$emailCheck->execute(array($this->email));
		$emailCount = $emailCheck->rowCount();

		if ($emailCount > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function createAccount() {
		$stmt = $this->connect()->prepare("INSERT INTO users (Username, Email, Password, GroupID) VALUES (?, ?, ?, ?)");
		$stmt->execute(array($this->username, $this->email, $this->hashedpass, $this->groupid));
	}
}