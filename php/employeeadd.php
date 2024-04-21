<!DOCTYPE html>
<html>

<head>
    <title>Airline Login</title>
    <link rel="stylesheet" href="employeeadd.css">
</head>

<body>
    <div class="container">
        <h1>Add a Flight</h1>
        <form action="employeeadd_.php" method="post">
            <label for="flightID">Flight ID:</label>
            <input type="text" name="flightID" id="flightID"><br>
            <label for="airline">Airline:</label>
            <input type="text" name="airline" id="airline"><br>
            <label for="numBags">Maximum Carry Ons:</label>
            <input type="text" name="numBags" id="numBags"><br>
            <label for="arrivalTime">Arrival Time:</label>
            <input type="text" name="arrivalTime" id="arrivalTime"><br>
            <label for="departureTime">Departure Time:</label>
            <input type="text" name="departureTime" id="departureTime"><br>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price"><br>
            <label for="terminal">Terminal:</label>
            <input type="text" name="terminal" id="terminal"><br>
            <label for="flightStatus">Flight Status:</label>
            <input type="text" name="flightStatus" id="flightStatus"><br>
            <label for="startingCity">Starting City:</label>
            <input type="text" name="startingCity" id="startingCity"><br>
            <label for="endCity">Ending City:</label>
            <input type="text" name="endCity" id="endCity"><br>
            <label for="startingGate">Starting Gate:</label>
            <input type="text" name="startingGate" id="startingGate"><br>
            <label for="endingGate">Ending Gate:</label>
            <input type="text" name="endingGate" id="endingGate"><br>
            <label for="seatClass">Seating Class:</label>
            <input type="text" name="seatClass" id="seatClass"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>