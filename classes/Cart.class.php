<?php

class Cart extends Dbh {
    private $ProductID;

    public function __construct($id) {
        $this->ProductID = $id;
    }
    public function GetImage() {
        $stmt = $this->connect()->prepare("SELECT ProductImage FROM products WHERE ID = ?");
        $stmt->execute(array($this->ProductID));
        $row = $stmt->fetch();

        return $row;
    }
}