<?php

class Login extends Dbh {
	private $username;
	private $password;

	public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
	}

	public function UserExist() {
		/* Checking If Username Already Exists In The Database */
		$userCheck = $this->connect()->prepare("SELECT * FROM users WHERE (Username = ? OR Email = ?)");
		$userCheck->execute(array($this->username, $this->username));
		$userCheck = $userCheck->rowCount();

		if ($userCheck > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function Authenticate() {
		/* Getting User From Database */
		$stmt = $this->connect()->prepare("SELECT * FROM users WHERE (Username = ? OR Email = ?)");
		$stmt->execute(array($this->username, $this->username));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();

		if ($count > 0) {
			$hashedpass = $row['Password'];

			if (password_verify($this->password, $hashedpass)) {
				return true;
			} else {
				return false;
			}
		}
	}
}