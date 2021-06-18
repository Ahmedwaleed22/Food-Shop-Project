<?php

class Dbh {
	private $host = '127.0.0.1';
	private $dbname = 'fruits';
	private $user = 'root';
	private $pass = '';

	protected function connect() {
		try {
			$conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			return $conn;
		} catch(PDOException $e) {
			echo $e;
			die();
		}
	}
}