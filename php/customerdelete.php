<?php
session_start();

$servername = "localhost";
$username = "root";
$db_password = "password";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $db_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION["id"];

$sql = "DELETE FROM Customers WHERE AccountID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$conn->close();

header("Location: http://localhost:3000/php/loginform.php");
