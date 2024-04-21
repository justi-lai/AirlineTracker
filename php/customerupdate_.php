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

$name = $_POST["Name"];
$email = $_POST["Email"];
$address = $_POST["Address"];
$numChildren = $_POST["numChildren"];
$ssn = $_POST["SSN"];
$cc = $_POST["CreditCard"];
$cced = $_POST["CCExpirationDate"];
$ccsc = $_POST["CCSecurityCode"];
$birthdate = $_POST["Birthdate"];
$password = $_POST["Password"];

$sql = "UPDATE Customers 
        SET    Name=?, Email=?, Address=?, numChildren=?, SSN=?, CreditCard=?, CCExpirationDate=?, CCSecurityCode=?, Birthdate=?, Password=?
        WHERE  AccountID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssissssssi", $name, $email, $address, $numChildren, $ssn, $cc, $cced, $ccsc, $birthdate, $password, $_SESSION["id"]);
$stmt->execute();

$conn->close();

$_SESSION["name"] = $name;
$_SESSION["Email"] = $email;
$_SESSION["Address"] = $address;
$_SESSION["numChildren"] = $numChildren;
$_SESSION["SSN"] = $ssn;
$_SESSION["CreditCard"] = $cc;
$_SESSION["CCExpirationDate"] = $cced;
$_SESSION["CCSecurityCode"] = $ccsc;
$_SESSION["Birthdate"] = $birthdate;
$_SESSION["Password"] = $password;

header("Location: http://localhost:3000/php/customermain.php");
