<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables received from form 
$eid = $mysqli->real_escape_string($_POST['eid']);
$status = $mysqli->real_escape_string($_POST['status']);

// Update query 
$query = "UPDATE employee
			SET statusOfApplication = '$status' 
            WHERE employee_id = '$eid'"; 
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<h2>Status successfully updated</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>