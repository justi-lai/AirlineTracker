<?php
$operation = $_POST["operation"];

if ($operation == "update") { // Update Info
    header("Location: http://localhost:3000/php/customerupdate.php");
} elseif ($operation == "delete") { // Delete Account
    header("Location: http://localhost:3000/php/customerdelete.php");
} elseif ($operation == "showFlights") { // Show Flights
    header("Location: http://localhost:3000/php/customerflights.php");
} elseif ($operation == "addFlight") { // Add Flight
    header("Location: http://localhost:3000/php/customerbook.php");
} else {
    header("Location: http://localhost:3000/php/customerremove.php");
}
