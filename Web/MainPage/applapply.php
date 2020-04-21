<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables received from form
$jid = $mysqli->real_escape_string($_POST['jid']); 
$aid = $mysqli->real_escape_string($_POST['aid']);

// Insertion query 
$query = "INSERT INTO application_list VALUES ($jid, $aid)";
$mysqli->query($query);

// Update application status query
$query = "UPDATE applicants
SET statusOfApplication = 'Pending'
WHERE applicant_id = $aid";
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Application successfully submitted</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>