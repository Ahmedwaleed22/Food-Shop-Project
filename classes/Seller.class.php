<?php

class Seller extends Dbh {
    public function GetSellerData($productid) {
        $stmt = $this->connect()->prepare("SELECT users.* FROM products INNER JOIN users ON products.UserID = users.ID WHERE products.ID = ?");
        $stmt->execute(array($productid));
        $row = $stmt->fetch();

        return $row;
    }
    public function GetSellerEmail($productid) {
        $stmt = $this->connect()->prepare("SELECT products.*, users.Email as email FROM products INNER JOIN users ON products.UserID = users.ID WHERE products.ID = ?");
        $stmt->execute(array($productid));
        $row = $stmt->fetch();
        $email = $row['email'];

        return $email;
    }
}