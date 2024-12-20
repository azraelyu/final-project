<?php 

namespace App\Models\Home;

class Order {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUserActiveOrders($id) {
        $sql = 'SELECT * FROM orders WHERE user_id = ? AND order_status = 0;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function createOrd($id) {
        $sql = 'INSERT INTO orders (user_id, created_at) VALUES (?, now());';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function pay($payment, $user) {
        $sql = 'UPDATE orders SET payment_id = ? WHERE user_id =?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$payment, $user]);
        return $stmt->fetchAll();
    }

    public function __destruct() {
        unset($this->conn);
    }
}
