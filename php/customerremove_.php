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

$sql = "DELETE FROM FLIES_ON
        WHERE       AccountID=? AND FlightID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $_POST["flightID"]);
$stmt->execute();

$conn->close();

header("Location: http://localhost:3000/php/customermain.php");
