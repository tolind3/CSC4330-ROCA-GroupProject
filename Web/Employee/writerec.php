<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables received from form
$super = $mysqli->real_escape_string($_POST['super_eid']); 
$eid = $mysqli->real_escape_string($_POST['eid']); 
$rec = $mysqli->real_escape_string($_POST['rec']);

// Update query 
$query = "UPDATE employee SET recommendation = '$rec' WHERE employee_id = $eid";
$mysqli->query($query);

// Remove outstanding recommendation request
$query = "DELETE FROM recommendations WHERE eid = $eid AND super_eid = $super";
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Recommendation successfully sent</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>