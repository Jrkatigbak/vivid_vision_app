<?php
include_once 'Db.php';

class Register {
    private $conn;
    private $table = "user";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($logo, $company, $email, $password_hash) {
        $query = "INSERT INTO " . $this->table . " (logo, company, email, password) VALUES (:logo, :company, :email, :password)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':logo', $logo);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password_hash);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}
?>
