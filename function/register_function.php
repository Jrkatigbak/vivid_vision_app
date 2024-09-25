<?php
session_start(); 
include '../Class/Db.php';
include '../Class/Register.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*
     Get form data
     converts special characters to HTML entities to prevent XSS attacks
    */
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $password = htmlspecialchars(strip_tags($_POST['password']));
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Validate if Valid Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save data to the database
        $database = new Db();
        $db = $database->connect();

        $register = new Register($db);

        // Verify Email Address if already in use
        if (!$register->verify_email($email)) {
            if ($register->register($name, $email, $password_hash)) {
                $msg = "'Account was registered successfully!','','success'";
            }
        } else {
            $msg = "'Email is already in use','','error'";
        }

    } else {
        $msg = "'Please provide a valid email.','','error'";
    }
} else {
    $msg = "'Invalid request method.','','error'";
}

$_SESSION['flash_message'] = $msg;
header("Location: ../register.php");
?>