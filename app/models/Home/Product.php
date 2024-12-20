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

    public function update($product, $id) {
        $sql = "UPDATE products SET description = ?, image = ?, price = ?, discount = ? WHERE id =$id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $product['description']);
        $stmt->bindParam(2, $product['image']);
        $stmt->bindParam(3, $product['price']);
        $stmt->bindParam(4, $product['discount']);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($request) {
        $sql = "INSERT INTO products (description, image, price, discount, created_at) VALUES (?, ?, ?, ?, now());";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $request['description']);
        $stmt->bindParam(2, $request['image']);
        $stmt->bindParam(3, $request['price']);
        $stmt->bindParam(4, $request['discount']);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function remove($id) {
        $sql = "DELETE FROM products WHERE id = ?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function __destruct() {
        unset($this->conn);
    }
}
