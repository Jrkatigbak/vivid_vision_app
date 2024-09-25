<?php
session_start(); 
include '../Class/Db.php';
include '../Class/Vivid_vision.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $database = new Db();
    $db = $database->connect();
    $vivid_vision = new Vivid_vision($db);

    /*
     Get form data
     converts special characters to HTML entities to prevent XSS attacks
    */
    $form_data = [
        'status' =>  htmlspecialchars(strip_tags($_POST['status'])),
        'owner' =>  htmlspecialchars(strip_tags($_POST['owner'])),
        'last_update' =>  htmlspecialchars(strip_tags($_POST['last_update'])),
        'vivid_mission' =>  htmlspecialchars(strip_tags($_POST['vivid_mission'])),
        'date_vivid_mission' =>  htmlspecialchars(strip_tags($_POST['date_vivid_mission'])),
        'accom1' =>  htmlspecialchars(strip_tags($_POST['accom1'])),
        'accom2' =>  htmlspecialchars(strip_tags($_POST['accom2'])),
        'accom3' =>  htmlspecialchars(strip_tags($_POST['accom3']))
    ];

    $result = $vivid_vision->save($form_data);
    if ($result['status']) {
        header("Location: pdf.php?id=".$result['id']);
        return false;
    }

}

?>