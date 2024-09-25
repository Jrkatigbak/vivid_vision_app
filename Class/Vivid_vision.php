<?php
include_once 'Db.php';

class Vivid_vision {
    private $conn;
    private $table = "vivid_vision_1";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function get($id){
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function get_version($id){
        $query = "SELECT b.* FROM versions a INNER JOIN vivid_vision_1 b ON a.id_vivid = b.id WHERE a.id_vivid = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function get_all_versions(){
        $query = "SELECT * FROM versions WHERE deleted_at = '' AND id_user = $_SESSION[id_user] ORDER BY id desc ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function save($form_data) {
        $query = "INSERT INTO " . $this->table . " (id_user, logo, company, status, owner, last_update, vivid_mission, date_accomp, date_vivid_mission, accom1, accom2, accom3, wwa1, wwa2, wwa3, wwa4, mission, wwd) 
        VALUES (:id_user, :logo, :company, :status, :owner, :last_update, :vivid_mission, :date_accomp, :date_vivid_mission, :accom1, :accom2, :accom3, :wwa1, :wwa2, :wwa3, :wwa4, :mission, :wwd)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_user', $form_data['id_user']);
        $stmt->bindParam(':logo', $form_data['logo']);
        $stmt->bindParam(':company', $form_data['company']);
        $stmt->bindParam(':status', $form_data['status']);
        $stmt->bindParam(':owner', $form_data['owner']);
        $stmt->bindParam(':last_update', $form_data['last_update']);
        $stmt->bindParam(':vivid_mission', $form_data['vivid_mission']);
        $stmt->bindParam(':date_accomp', $form_data['date_accomp']);
        $stmt->bindParam(':date_vivid_mission', $form_data['date_vivid_mission']);
        $stmt->bindParam(':accom1', $form_data['accom1']);
        $stmt->bindParam(':accom2', $form_data['accom2']);
        $stmt->bindParam(':accom3', $form_data['accom3']);
        $stmt->bindParam(':wwa1', $form_data['wwa1']);
        $stmt->bindParam(':wwa2', $form_data['wwa2']);
        $stmt->bindParam(':wwa3', $form_data['wwa3']);
        $stmt->bindParam(':wwa4', $form_data['wwa4']);
        $stmt->bindParam(':mission', $form_data['mission']);
        $stmt->bindParam(':wwd', $form_data['wwd']);

        if ($stmt->execute()) {
            return [
                'status' => true,
                'id' => $this->conn->lastInsertId()
            ];
        }

        return false;
    }

    public function save_version($id_vivid){
        $query = "INSERT INTO versions (id_user, id_vivid)
        VALUES (:id_user, :id_vivid)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_user', $_SESSION['id_user']);
        $stmt->bindParam(':id_vivid', $id_vivid);

        $stmt->execute();
    }

    public function delete($id){
        $deleted_at = date('Y-m-d H:i:s');
        $query = "UPDATE versions set deleted_at = '$deleted_at'  WHERE id =$id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }

}
?>
