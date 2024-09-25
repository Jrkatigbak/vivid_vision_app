<?php
session_start(); 
include '../Class/Db.php';
include '../Class/Vivid_vision.php';


$id = $_POST['id'];

$database = new Db();
$db = $database->connect();
$vivid_vision = new Vivid_vision($db);
$vivid_vision->delete($id);

?>