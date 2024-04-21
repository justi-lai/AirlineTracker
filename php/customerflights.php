<?php
session_start();
?>

<!DOCTYPE html>
<html>
<h1>Your Flight</h1><br>
<link rel="stylesheet" type="text/css" href="customerflights.css">
<div class="container">
    <?php
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
        FROM   FLIES_ON AS FO, FLIGHT_INFORMATION AS FI
        WHERE  FO.AccountID=? and FO.FlightID=FI.FlightID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION["id"]);
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
    }
    ?>
    <form action="customermain.php" method="post">
        <input type="submit" value="Return">
    </form>
</div>

</html>