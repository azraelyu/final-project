<?php 

namespace App\Models\Home;

class OrderItems {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getOrderItems($order) {
        $sql = 'SELECT * FROM order_items WHERE order_id = ?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order]);
        return $stmt->fetchAll();
    }

    public function addNumber($order_item) {
        $sql = 'UPDATE order_items SET number = number+1 WHERE id =?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order_item]);
        return $stmt->fetch();
    }

    public function decNumber($order_item) {
        $sql = 'UPDATE order_items SET number = number-1 WHERE id =?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order_item]);
        return $stmt->fetch();
    }

    public function haveProduct($order, $product) {
        $sql = 'SELECT * FROM order_items WHERE order_id = ? AND product_id = ?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order, $product]);
        return $stmt->fetchAll();
    }

    public function crateItem($order, $product) {
        $sql = 'INSERT INTO order_items (order_id, product_id, created_at) VALUES (?, ?, now());';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order, $product['id']]);
        return $stmt->fetchAll();
    }

    public function __destruct() {
        unset($this->conn);
    }
}
