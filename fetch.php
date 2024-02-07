<?php
session_start();

// Assuming you have a database connection established in the trains.php file
$mysqli = require __DIR__ . "/trains.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startStation = $_POST["start_station"];

    // Query to retrieve trains from the database based on the start station
    $query = "SELECT * FROM trainbetweenstations WHERE FromStation = '$startStation'";
    $result = $mysqli->query($query);

    // Check if there are any trains found
    if ($result && $result->num_rows > 0) {
        echo "<h2>Trains from $startStation:</h2>";
        // Loop through each row of the result set and print train details
        while ($row = $result->fetch_assoc()) {
            echo "<p>Train No: " . $row["TrainNo"] . "</p>";
            echo "<p>Train Name: " . $row["TrainName"] . "</p>";
            echo "<p>From Station: " . $row["FromStation"] . "</p>";
            echo "<p>To Station: " . $row["ToStation"] . "</p>";
            echo "<p>Running Days: " . $row["RunningDays"] . "</p>";
            echo "<p>Classes: " . $row["Classes"] . "</p>";
            echo "<p>Source Time: " . $row["SourceTime"] . "</p>";
            echo "<p>Destination Time: " . $row["DestinationTime"] . "</p>";
            echo "<p>Train Type: " . $row["TrainType"] . "</p>";
            echo "<p>Duration: " . $row["Duration"] . "</p><br>";
        }
    } else {
        echo "No trains found for the given start station.";
    }

    // Close the database connection
    $mysqli->close();
}
?>
