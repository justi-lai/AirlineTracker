<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Your Title Here</title>
    <link rel="stylesheet" type="text/css" href="customermain.css">
</head>

<body class="body">
    <div class="container">
        <h1>Welcome <?php echo $_SESSION["name"] ?>!</h1>

        <h3 class="h3">What would you like to do?</h3>
        <form action="customerdirect.php" method="post">
            <label for="operation">Choose an operation:</label>
            <select id="operation" name="operation" class="select">
                <option value="update">Update Info</option>
                <option value="delete">Delete Account</option>
                <option value="showFlights">Show Flights</option>
                <option value="addFlight">Book Flight</option>
                <option value="removeFlight">Remove Flight</option>
            </select><br>
            <input type="submit" value="Submit" class="submit">
        </form>

        <?php
        $servername = "localhost";
        $username = "root";
        $db_password = "password";
        $dbname = "project";
        $conn = new mysqli($servername, $username, $db_password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * 
                    FROM Customers
                    WHERE AccountID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION["id"]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='customer-info'>";
                echo "<p>Account ID: " . $row["AccountID"] . "</p>";
                echo "<p>RewardPoints: " . $row["RewardPoints"] . "</p>";
                echo "<p>Email: " . $row["Email"] . "</p>";
                echo "<p>Address: " . $row["Address"] . "</p>";
                echo "<p>Name: " . $row["Name"] . "</p>";
                echo "<p>numChildren: " . $row["numChildren"] . "</p>";
                echo "<p>Citizenship: " . $row["Citizenship"] . "</p>";
                echo "<p>TSAPreCheck: " . $row["TSAPreCheck"] . "</p>"; // Assuming boolean (Yes/No indication)
                echo "<p>SSN: " . $row["SSN"] . "</p>";
                echo "<p>CreditCard: " . $row["CreditCard"] . "</p>";
                echo "<p>CCExpirationDate: " . $row["CCExpirationDate"] . "</p>";
                echo "<p>CCSecurityCode: " . $row["CCSecurityCode"] . "</p>";
                echo "<p>Birthdate: " . $row["Birthdate"] . "</p>";
                echo "<p>Password: " . $row["Password"] . "</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>

</html>