<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database 
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables received from form
$eid = $mysqli->real_escape_string($_POST['eid']); 
$receiver = $mysqli->real_escape_string($_POST['receiver']);
$message = $mysqli->real_escape_string($_POST['message']);

// Insertion query 
$query = "INSERT INTO messages VALUES ($eid, $receiver, '$message')";

// Execute query
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Message successfully sent</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>