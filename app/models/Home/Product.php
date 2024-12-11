<?php 

namespace App\Models\Home;

class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getBanners() {
        $sql = "SELECT * FROM products ORDER BY price DESC LIMIT 4;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCountOfProducts() {
        $sql = "SELECT COUNT(*) FROM products;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProduct($id) {
        $sql = "SELECT * FROM products WHERE id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function __destruct() {
        unset($this->conn);
    }
}
