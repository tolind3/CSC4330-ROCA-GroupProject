<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database 
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables received from form
$jid = $mysqli->real_escape_string($_POST['jid']); 
$eid = $mysqli->real_escape_string($_POST['eid']);

// Insertion query 
$query = "INSERT INTO employee_applications VALUES ($jid, $eid)"; 
$mysqli->query($query);

// Update application status query
$query = "UPDATE employee
SET statusOfApplication = 'Pending'
WHERE employee_id = $eid";
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Application successfully submitted</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>