<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql databaase 
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables received from form
$description = $mysqli->real_escape_string($_POST['description']); 
$status = $mysqli->real_escape_string($_POST['status']); 
$cid = $mysqli->real_escape_string($_POST['cid']);
$location = $mysqli->real_escape_string($_POST['location']); 
$month = $mysqli->real_escape_string($_POST['month']); 
$day = $mysqli->real_escape_string($_POST['day']);
$year = $mysqli->real_escape_string($_POST['year']); 

// Insertion query 
$query = "INSERT INTO job_opening (description, status, company_id, Month, Day, Year, location)
			VALUES ('$description', '$status', '$cid', '$month', '$day', '$year', '$location')";
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Job posting successfully created</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>