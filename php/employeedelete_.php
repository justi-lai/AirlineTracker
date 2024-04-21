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

$flightID = $_POST["flightID"];

$sql = "DELETE FROM FLIGHT_INFORMATION 
        WHERE       FlightID IN (
            SELECT  M.FlightID
            FROM    MANAGES AS M
            WHERE   M.EmployeeID = ?)
        AND FlightID IN (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $_SESSION["id"], $flightID);
$stmt->execute();

$conn->close();

header("Location: http://localhost:3000/php/employeemain.php");
