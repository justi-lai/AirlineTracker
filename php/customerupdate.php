<?php
session_start();

$name = $_SESSION["name"];
$email = $_SESSION["Email"];
$address = $_SESSION["Address"];
$numChildren = $_SESSION["numChildren"];
$ssn = $_SESSION["SSN"];
$cc = $_SESSION["CreditCard"];
$cced = $_SESSION["CCExpirationDate"];
$ccsc = $_SESSION["CCSecurityCode"];
$birthdate = $_SESSION["Birthdate"];
$password = $_SESSION["Password"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" type="text/css" href="customermain.css">
</head>
<body class="body">
    <div class="container">
        <h1 class="h1">Welcome Customer!</h1>

        <h3 class="h3">Update any information here</h3>
        <form action="customerupdate_.php" method="post" class="form">
            <label for="Name" class="label">Name:</label>
            <input type="text" name="Name" value="<?php echo $name ?>" class="input"><br>
            <label for="Email" class="label">Email:</label>
            <input type="text" name="Email" value="<?php echo $email ?>" class="input"><br>
            <label for="Address" class="label">Address:</label>
            <input type="text" name="Address" value="<?php echo $address ?>" class="input"><br>
            <label for="numChildren" class="label">Number of Children:</label>
            <input type="text" name="numChildren" value="<?php echo $numChildren ?>" class="input"><br>
            <label for="SSN" class="label">SSN:</label>
            <input type="text" name="SSN" value="<?php echo $ssn ?>" class="input"><br>
            <label for="CreditCard" class="label">Credit Card Number:</label>
            <input type="text" name="CreditCard" value="<?php echo $cc ?>" class="input"><br>
            <label for="CCExpirationDate" class="label">CC Expiration Date:</label>
            <input type="text" name="CCExpirationDate" value="<?php echo $cced ?>" class="input"><br>
            <label for="CCSecurityCode" class="label">CC Security Code:</label>
            <input type="text" name="CCSecurityCode" value="<?php echo $ccsc ?>" class="input"><br>
            <label for="Birthdate" class="label">Birthdate:</label>
            <input type="text" name="Birthdate" value="<?php echo $birthdate ?>" class="input"><br>
            <label for="Password" class="label">Password:</label>
            <input type="password" name="Password" value="<?php echo $password ?>" class="input"><br>
            <input type="submit" value="Submit" class="submit"><br>
        </form>
    </div>
</body>
</html>
