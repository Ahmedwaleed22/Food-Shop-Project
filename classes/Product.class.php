<?php

class Product extends Dbh {
    public function Fetch($category) {
        if ($category == "all") {
            $stmt = $this->connect()->query("SELECT products.*, users.Username as username FROM products INNER JOIN users ON products.UserID = users.ID");

            while ($rows = $stmt->fetchall()) {
                return $rows;
            }
        } elseif ($category == "foods" || $category == "drinks") {
            $stmt = $this->connect()->prepare("SELECT products.*, users.Username as username FROM products INNER JOIN users ON products.UserID = users.ID WHERE products.ProductCategory = ?");
            $stmt->execute(array($category));

            while ($rows = $stmt->fetchall()) {
                return $rows;
            }
        } else {
            $stmt = $this->connect()->query("SELECT products.*, users.Username as username FROM products INNER JOIN users ON products.UserID = users.ID");

            while ($rows = $stmt->fetchall()) {
                return $rows;
            }
        }
    }
    public function FetchTop() {
        $stmt = $this->connect()->query("SELECT products.*, users.Username as username FROM products INNER JOIN users ON products.UserID = users.ID LIMIT 25");

        while ($rows = $stmt->fetchall()) {
            return $rows;
        }
    }
    public function UserProducts($username) {
        $stmt = $this->connect()->prepare("SELECT ID FROM users WHERE Username = ?");
        $stmt->execute(array($username));
        $row = $stmt->fetch();
        $userid = $row['ID'];

        $stmt2 = $this->connect()->query("SELECT * FROM products WHERE UserID = " . $userid);
        while ($rows = $stmt2->fetchall()) {
            return $rows;
        }
    }
    public function Add($image, $name, $smallprice, $mediumprice, $largeprice, $category, $username) {
        $stmt = $this->connect()->prepare("SELECT ID FROM users WHERE Username = ?");
        $stmt->execute(array($username));
        $row = $stmt->fetch();
        $userid = $row['ID'];

        $stmt2 = $this->connect()->prepare("INSERT INTO products (ProductImage, ProductName, ProductSmallPrice, ProductPrice, ProductLargePrice, ProductCategory, UserID) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt2->execute(array($image, $name, $smallprice, $mediumprice, $largeprice, $category, $userid));
    }
    public function Delete($id) {
        $stmt = $this->connect()->prepare("DELETE FROM products WHERE ID = ?");
        $stmt->execute(array($id));
    }
    public function GetProductById($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE ID = ?");
        $stmt->execute(array($id));
        $count = $stmt->rowcount();
        $row = $stmt->fetch();

        if ($count > 0) {
            return $row;
        } else {
            return false;
        }
    }
    public function EditProduct($productImage, $productName, $productSmallPrice, $productMediumPrice, $productLargePrice, $category, $userid, $id) {
        $stmt = $this->connect()->prepare("UPDATE products SET ProductImage = ?, ProductName = ?, ProductPrice = ?, ProductSmallPrice = ?, ProductLargePrice = ?, ProductCategory = ?, UserID = ? WHERE ID = ?");
        $stmt->execute(array($productImage, $productName, $productMediumPrice, $productSmallPrice, $productLargePrice, $category, $userid, $id));
        $count = $stmt->rowcount();
    }
}