<!DOCTYPE html>
<html>

<head>
    <title>Emlpoyee View</title>
    <link rel="stylesheet" type="text/css" href="employeeview.css">
    <div class="container">
        <h1>Flights You Manage</h1>
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

        $sql = "SELECT FI.FlightID, FI.Airline, FI.numBags, FI.ArrivalTime, FI.DepartureTime, FI.Price, FI.Terminal, FI.FlightStatus, FI.StartingCity, FI.EndCity, FI.StartingGate, FI.EndingGate, FI.SeatClass
                FROM   MANAGES AS M
                JOIN   FLIGHT_INFORMATION AS FI ON M.FlightID=FI.FlightID
                WHERE  M.EmployeeID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION["id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='Flight_Information'>";
                echo "<p>FlightID: " . $row["FlightID"] . "</p>";
                echo "<p>Airline: " . $row["Airline"] . "</p>";
                echo "<p>numBags: " . $row["numBags"] . "</p>";
                echo "<p>ArrivalTime: " . $row["ArrivalTime"] . "</p>";
                echo "<p>DepartureTime: " . $row["DepartureTime"] . "</p>";
                echo "<p>Price: " . $row["Price"] . "</p>";
                echo "<p>Terminal: " . $row["Terminal"] . "</p>";
                echo "<p>FlightStatus: " . $row["FlightStatus"] . "</p>";
                echo "<p>StartingCity: " . $row["StartingCity"] . "</p>";
                echo "<p>EndCity: " . $row["EndCity"] . "</p>";
                echo "<p>StartingGate: " . $row["StartingGate"] . "</p>";
                echo "<p>EndingGate: " . $row["EndingGate"] . "</p>";
                echo "<p>SeatClass: " . $row["SeatClass"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>You do not manage any flights</p>";
        }
        ?>
        <form action="employeemain.php" method="post">
            <input type="submit" value="Return">
        </form>
    </div>
</head>