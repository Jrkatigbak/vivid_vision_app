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

    // Check if file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

        // Set the upload directory
        $uploadDir = '../assets/img/upload/logo/';

        // Get the file details
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Allowed file extensions
        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif');

        // Validate file extension
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $newFileName = uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

            // Move the file to the target directory
            $dest_path = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // echo "Image uploaded successfully!";
                // echo "File saved at: " . $dest_path;
            } else {
                echo "There was an error moving the uploaded file.";
            }
        }
    }else{
        $newFileName = '';
    }

    $form_data = [
        'id_user'               =>  $_SESSION['id_user'],
        'logo'                  =>  $newFileName,
        'company'               =>  htmlspecialchars(strip_tags($_POST['company'])),
        'status'                =>  htmlspecialchars(strip_tags($_POST['status'])),
        'owner'                 =>  htmlspecialchars(strip_tags($_POST['owner'])),
        'last_update'           =>  htmlspecialchars(strip_tags($_POST['last_update'])),
        'vivid_mission'         =>  htmlspecialchars(strip_tags($_POST['vivid_mission'])),
        'date_accomp'           =>  htmlspecialchars(strip_tags($_POST['date_accomp'])),
        'date_vivid_mission'    =>  htmlspecialchars(strip_tags($_POST['date_vivid_mission'])),
        'accom1'                =>  htmlspecialchars(strip_tags($_POST['accom1'])),
        'accom2'                =>  htmlspecialchars(strip_tags($_POST['accom2'])),
        'accom3'                =>  htmlspecialchars(strip_tags($_POST['accom3'])),
        'wwa1'                  =>  htmlspecialchars(strip_tags($_POST['wwa1'])),
        'wwa2'                  =>  htmlspecialchars(strip_tags($_POST['wwa2'])),
        'wwa3'                  =>  htmlspecialchars(strip_tags($_POST['wwa3'])),
        'wwa4'                  =>  htmlspecialchars(strip_tags($_POST['wwa4'])),
        'mission'               =>  htmlspecialchars(strip_tags($_POST['mission'])),
        'wwd'                   =>  htmlspecialchars(strip_tags($_POST['wwd'])),
    ];

    $result = $vivid_vision->save($form_data);
    if ($result['status']) {
        header("Location: pdf.php?id=".$result['id']);
        return false;
    }

}

?>