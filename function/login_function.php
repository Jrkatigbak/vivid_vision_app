<?php
session_start(); 
include '../Class/Db.php';
include '../Class/Login.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $database = new Db();
    $db = $database->connect();
    $login = new Login($db);
    
    /*
     Get form data
     converts special characters to HTML entities to prevent XSS attacks
    */
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $password = htmlspecialchars(strip_tags($_POST['password']));

    
    // Verify login
    $result = $login->verify($email, $password);
    $_SESSION['flash_message'] = $result['message'];
    if ($result['status']) {
        // Successful login
        header("Location: ../index.php");
    } else {
        // Invalid login
        header("Location: ../login.php");
    }
} 


?>