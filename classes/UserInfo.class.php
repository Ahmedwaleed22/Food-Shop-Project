<?php

class UserInfo extends Dbh {
    public function GetInfo($username) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute(array($username));
        $row = $stmt->fetch();

        return $row;
    }
    public function EditInfo($username, $email, $password) {
        $stmt = $this->connect()->prepare("UPDATE users SET Username = ?, Email = ?, Password = ? WHERE Username = ?");
        $stmt->execute(array($username, $email, $password, $username));
    }
    public function RemoveAccount($username) {
        $stmt = $this->connect()->prepare("DELETE FROM users WHERE Username = ?");
        $stmt->execute(array($username));
    }
}