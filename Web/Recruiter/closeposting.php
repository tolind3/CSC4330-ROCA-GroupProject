<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database 
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variable received from form
$jid = $mysqli->real_escape_string($_POST['jid']);  

// Update query 
$query = "UPDATE job_opening SET status = 'Closed to Application' WHERE opening_id = $jid";
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Job posting successfully closed</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>