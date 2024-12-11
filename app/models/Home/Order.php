<?php 

namespace App\Models\Home;

class Order {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllUserOrder($id) {
        $sql = "SELECT * FROM orders WHERE user_id = ?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function getProduct($user) {
        $sql = "SELECT * FROM products WHERE id=?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user]);
        return $stmt->fetch();
    }

    public function __destruct() {
        unset($this->conn);
    }
}
