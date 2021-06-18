<?php

class OrderSubmit extends Dbh {
    public function StoreToDB($ProductName, $ProductPrice, $ProductSize, $Seller, $Client) {
        $stmt = $this->connect()->prepare("INSERT INTO orders (ProductName, ProductPrice, ProductSize, Seller, Client) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($ProductName, $ProductPrice, $ProductSize, $Seller, $Client));
    }
}