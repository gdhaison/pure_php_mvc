<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$db = "testdb";

require_once("Controller/Manager/ManagerController.php");
require_once("Controller/User/UserController.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$controller = (isset($_GET['controller']) ? $_GET['controller'] : null);
$action = (isset($_GET['action']) ? $_GET['action'] : null);
$id = (isset($_GET['id']) ? $_GET['id'] : null);
const Manager = 'manager';
const User = 'user';

$current_controller = null;
if($controller == Manager){
    $current_controller = new ManagerController();
}
elseif ($controller == User){
    $current_controller = new UserController();
}

$current_controller->$action($id);
