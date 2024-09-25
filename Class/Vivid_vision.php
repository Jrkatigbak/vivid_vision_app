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
        $into = '';
        $values = '';
        foreach($form_data as $key => $value){
            $into .= $key.','; 
            $values .= ':'.$key.','; 
        }
        $newinto = rtrim($into, ",");
        $newvalues = rtrim($values, ",");
        $query = "INSERT INTO " . $this->table . " ($newinto) 
        VALUES ($newvalues)";
        $stmt = $this->conn->prepare($query);
        // print_r($form_data);die('x');

        $stmt->bindParam(':id_user', $_SESSION['id_user']);
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
        $stmt->bindParam(':vv21', $form_data['vv21']);
        $stmt->bindParam(':vv22', $form_data['vv22']);
        $stmt->bindParam(':vv23', $form_data['vv23']);
        $stmt->bindParam(':vv24', $form_data['vv24']);
        $stmt->bindParam(':vv25', $form_data['vv25']);
        $stmt->bindParam(':vv26', $form_data['vv26']);
        $stmt->bindParam(':vv27', $form_data['vv27']);
        $stmt->bindParam(':vv28', $form_data['vv28']);
        $stmt->bindParam(':vv29', $form_data['vv29']);
        $stmt->bindParam(':vv210', $form_data['vv210']);
        $stmt->bindParam(':vv211', $form_data['vv211']);
        $stmt->bindParam(':vv212', $form_data['vv212']);
        $stmt->bindParam(':vv213', $form_data['vv213']);
        $stmt->bindParam(':vv214', $form_data['vv214']);
        $stmt->bindParam(':vv215', $form_data['vv215']);
        $stmt->bindParam(':vv216', $form_data['vv216']);
        $stmt->bindParam(':vv217', $form_data['vv217']);

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
