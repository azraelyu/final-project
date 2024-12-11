<?php 

namespace App\Models\Home;

class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUser($email) {
        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function createUser($request) {
        // dd($request);
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':first_name', $request['first_name']);
        $stmt->bindParam(':last_name', $request['last_name']);
        $stmt->bindParam(':email', $request['email']);
        $stmt->bindParam(':password', $request['password']);
        $stmt->execute();
        return 1;
    }

    public function __destruct() {
        unset($this->conn);
    }
}
