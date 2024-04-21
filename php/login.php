<?php
//Start session
session_start();

$_SESSION["id"] = $_POST["id"];
$_SESSION["password"] = $_POST["password"];
$_SESSION["name"] = "";

$loginType = $_POST["loginType"];
$id = $_POST["id"];
$passwordInput = $_POST["password"];

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

if ($loginType == "customer") {
  // Using prepared statements to prevent SQL injection
  $sql = "SELECT *
            FROM Customers
            WHERE AccountID=? AND Password=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $id, $passwordInput);
  $stmt->execute();
  $result = $stmt->get_result();

  $row = $result->fetch_assoc();
  $_SESSION["AccountID"] = $row["AccountID"];
  $_SESSION["RewardPoints"] = $row["RewardPoints"];
  $_SESSION["Email"] = $row["Email"];
  $_SESSION["Address"] = $row["Address"];
  $_SESSION["name"] = $row["Name"];
  $_SESSION["numChildren"] = $row["numChildren"];
  $_SESSION["Citizenship"] = $row["Citizenship"];
  $_SESSION["TSAPreCheck"] = $row["TSAPreCheck"];
  $_SESSION["SSN"] = $row["SSN"];
  $_SESSION["CreditCard"] = $row["CreditCard"];
  $_SESSION["CCExpirationDate"] = $row["CCExpirationDate"];
  $_SESSION["CCSecurityCode"] = $row["CCSecurityCode"];
  $_SESSION["Birthdate"] = $row["Birthdate"];
  $_SESSION["Password"] = $row["Password"];

  if ($result->num_rows > 0) {
    header("Location: http://localhost:3000/php/customermain.php");
  } else {
    header("Location: http://localhost:3000/php/loginform.php");
  }
} else if ($loginType == "employee") {
  // Using prepared statements to prevent SQL injection
  $sql = "SELECT *
            FROM Employee
            WHERE EmployeeID=? AND Password=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $id, $passwordInput);
  $stmt->execute();
  $result = $stmt->get_result();

  $row = $result->fetch_assoc();
  $_SESSION["id"] = $row["EmployeeID"];
  $_SESSION["Email"] = $row["Email"];
  $_SESSION["Airline"] = $row["Airline"];
  $_SESSION["name"] = $row["Name"];
  $_SESSION["Password"] = $row["Password"];

  if ($result->num_rows > 0) {
    header("Location: http://localhost:3000/php/employeemain.php");
  } else {
    header("Location: http://localhost:3000/php/loginform.php");
  }
} else {
  $_SESSION["name"] = "";
  header("Location: http://localhost:3000/php/loginform.php");
}
$conn->close();
