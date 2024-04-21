<?php
session_start();

$servername = "localhost";
$username = "root";
$db_password = "password";
$dbname = "project";

$conn = new mysqli($servername, $username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$flightID = $_POST["flightID"];
$airline = $_POST["airline"];
$numBags = $_POST["numBags"];
$arrivalTime = $_POST["arrivalTime"];
$departureTime = $_POST["departureTime"];
$price = $_POST["price"];
$terminal = $_POST["terminal"];
$flightStatus = $_POST["flightStatus"];
$startingCity = $_POST["startingCity"];
$endCity = $_POST["endCity"];
$startingGate = $_POST["startingGate"];
$endingGate = $_POST["endingGate"];
$seatClass = $_POST["seatClass"];

$sql = "INSERT INTO FLIGHT_INFORMATION (FlightID, Airline, numBags, ArrivalTime, DepartureTime, Price, Terminal, FlightStatus, StartingCity, EndCity, StartingGate, EndingGate, SeatClass)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isissssssssss", $flightID, $airline, $numBags, $arrivalTime, $departureTime, $price, $terminal, $flightStatus, $startingCity, $endCity, $startingGate, $endingGate, $seatClass);
$stmt->execute();

$sql = "INSERT INTO MANAGES (EmployeeID, FlightID)
        VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $_SESSION["id"], $flightID);
$stmt->execute();

$conn->close();

header("Location: http://localhost:3000/php/employeeview.php");
