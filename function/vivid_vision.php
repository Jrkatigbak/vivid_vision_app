<?php
session_start(); 
include '../Class/Db.php';
include '../Class/Vivid_vision.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $database = new Db();
    $db = $database->connect();
    $vivid_vision = new Vivid_vision($db);


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

    /*
     Get form data
     converts special characters to HTML entities to prevent XSS attacks
    */
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
        'vv21'                  =>  htmlspecialchars(strip_tags($_POST['vv21'])),
        'vv22'                  =>  htmlspecialchars(strip_tags($_POST['vv22'])),
        'vv23'                  =>  htmlspecialchars(strip_tags($_POST['vv23'])),
        'vv24'                  =>  htmlspecialchars(strip_tags($_POST['vv24'])),
        'vv25'                  =>  htmlspecialchars(strip_tags($_POST['vv25'])),
        'vv26'                  =>  htmlspecialchars(strip_tags($_POST['vv26'])),
        'vv27'                  =>  htmlspecialchars(strip_tags($_POST['vv27'])),
        'vv28'                  =>  htmlspecialchars(strip_tags($_POST['vv28'])),
        'vv29'                  =>  htmlspecialchars(strip_tags($_POST['vv29'])),
        'vv210'                 =>  htmlspecialchars(strip_tags($_POST['vv210'])),
        'vv211'                 =>  htmlspecialchars(strip_tags($_POST['vv211'])),
        'vv212'                 =>  htmlspecialchars(strip_tags($_POST['vv212'])),
        'vv213'                 =>  htmlspecialchars(strip_tags($_POST['vv213'])),
        'vv214'                 =>  htmlspecialchars(strip_tags($_POST['vv214'])),
        'vv215'                 =>  htmlspecialchars(strip_tags($_POST['vv215'])),
        'vv216'                 =>  htmlspecialchars(strip_tags($_POST['vv216'])),
        'vv217'                 =>  htmlspecialchars(strip_tags($_POST['vv217'])),
        'vv31'                 =>  htmlspecialchars(strip_tags($_POST['vv31'])),
        'vv32'                 =>  htmlspecialchars(strip_tags($_POST['vv32'])),
        'vv33'                 =>  htmlspecialchars(strip_tags($_POST['vv33'])),
        'vv34'                 =>  htmlspecialchars(strip_tags($_POST['vv34'])),
        'vv35'                 =>  htmlspecialchars(strip_tags($_POST['vv35'])),
        'vv36'                 =>  htmlspecialchars(strip_tags($_POST['vv36'])),
        'vv37'                 =>  htmlspecialchars(strip_tags($_POST['vv37'])),
        'vv38'                 =>  htmlspecialchars(strip_tags($_POST['vv38'])),
    ];

    $result = $vivid_vision->save($form_data);
    if ($result['status']) {

        // Save Vivid Version
        $vivid_vision->save_version($result['id']);

        // Redirect to PDF Copy of the Vivid
        header("Location: pdf.php?id=".$result['id']);
        return false;
    }

}

?>