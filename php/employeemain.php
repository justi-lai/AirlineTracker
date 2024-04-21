<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Emlpoyee Account</title>
    <link rel="stylesheet" type="text/css" href="employeemain.css">
</head>

<body class="body">
    <div class="container">
        <h1 class="h1">Welcome <?php echo $_SESSION["name"] ?>!</h1>
        <h3 class="h3">What would you like to do?</h3>
        <form action="employeedirect.php" method="post" class="form">
            <label for="operation" class="label">Choose an operation:</label>
            <select id="operation" name="operation" class="select">
                <option value="viewFlights">View Flights</option>
                <option value="add a flight">Add a Flight</option>
                <option value="delete a flight">Delete a Flight</option>
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
                FROM EMPLOYEE
                WHERE EMPLOYEEID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION["id"]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='EMPLOYEE-info'>";
                echo "<p>Email: " . $row["Email"] . "</p>";
                echo "<p>Airline: " . $row["Airline"] . "</p>";
                echo "<p>Name: " . $row["Name"] . "</p>";
                echo "<p>Password: " . $row["Password"] . "</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>

</html>