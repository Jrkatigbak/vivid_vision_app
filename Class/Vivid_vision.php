<?php
include_once 'Db.php';

class Vivid_vision {
    private $conn;
    private $table = "vivid_vision_1";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function save($form_data) {
        $query = "INSERT INTO " . $this->table . " (status, owner, last_update, vivid_mission, date_vivid_mission, accom1, accom2, accom3) 
        VALUES (:status, :owner, :last_update, :vivid_mission, :date_vivid_mission, :accom1, :accom2, :accom3)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':status', $form_data['status']);
        $stmt->bindParam(':owner', $form_data['owner']);
        $stmt->bindParam(':last_update', $form_data['last_update']);
        $stmt->bindParam(':vivid_mission', $form_data['vivid_mission']);
        $stmt->bindParam(':date_vivid_mission', $form_data['date_vivid_mission']);
        $stmt->bindParam(':accom1', $form_data['accom1']);
        $stmt->bindParam(':accom2', $form_data['accom2']);
        $stmt->bindParam(':accom3', $form_data['accom3']);

        if ($stmt->execute()) {
            return [
                'status' => true,
                'id' => $this->conn->lastInsertId()
            ];
        }

        return false;
    }

}
?>
