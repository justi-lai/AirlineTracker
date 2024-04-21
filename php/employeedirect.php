<?php
$operation = $_POST["operation"];

if ($operation == "viewFlights") { // View Flights
    header("Location: http://localhost:3000/php/employeeview.php");
} elseif ($operation == "add a flight") { // Update Info
    header("Location: http://localhost:3000/php/employeeadd.php");
} else { // Delete Flight
    header("Location: http://localhost:3000/php/employeedelete.php");
}
