<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables submitted by form
$eid = $mysqli->real_escape_string($_POST['rec_eid']); 
$super = $mysqli->real_escape_string($_POST['super']);

// Insertion query 
$query = "INSERT INTO recommendations VALUES ($eid, $super)";

// Execute query 
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Request successfully sent</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>