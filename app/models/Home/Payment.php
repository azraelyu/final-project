<?php 

namespace App\Models\Home;

class Payment {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($user) {
        $sql = 'INSERT INTO payments (amount, user_id, gateway, transaction_id, bank_first_response, bank_second_response, status, created_at) VALUES (1, ?, "Saman-Bank", 1, "yes", "no", 1, now());';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user]);
        return $stmt->fetchAll();
    }

    public function getPayment($user) {
        $sql = 'SELECT * FROM payments WHERE user_id = ? AND status = 1;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user]);
        return $stmt->fetch();
    }

    public function change($payment) {
        $sql = 'UPDATE payments SET status = 2 WHERE id =?;';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$payment]);
        return $stmt->fetchAll();
    }

    public function __destruct() {
        unset($this->conn);
    }
}
