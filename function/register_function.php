<?php
session_start(); 
include '../Class/Db.php';
include '../Class/Register.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*
     Get form data
     converts special characters to HTML entities to prevent XSS attacks
    */
    $logo = htmlspecialchars(strip_tags($_POST['logo']));
    $company =  htmlspecialchars(strip_tags($_POST['company'])); //htmlspecialchars($_POST['company'], ENT_QUOTES, 'UTF-8'); 
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $password = htmlspecialchars(strip_tags($_POST['password']));
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save data to the database
        $database = new Db();
        $db = $database->connect();

        $register = new Register($db);
        if ($register->register($logo, $company, $email, $password_hash)) {
            $msg = "'Account was registered successfully!','','success'";
        } else {
            $msg = "'Failed to save user.','','error'";
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