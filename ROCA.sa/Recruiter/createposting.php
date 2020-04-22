<?php
session_start();

$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);

$description = $mysqli->real_escape_string($_POST['description']); 
$status = $mysqli->real_escape_string($_POST['status']); 
$cid = $_SESSION['comp'];
$location = $mysqli->real_escape_string($_POST['location']); 
$month = $mysqli->real_escape_string($_POST['month']); 
$day = $mysqli->real_escape_string($_POST['day']);
$year = $mysqli->real_escape_string($_POST['year']); 
 
$query = "INSERT INTO job_opening (description, status, company_id, Month, Day, Year, location)
			VALUES ('$description', '$status', '$cid', '$month', '$day', '$year', '$location')";
$mysqli->query($query);

$mysqli->close();
echo "<br>";
echo "<h2>Job posting successfully created</h2>";
echo "<br>";
echo "<a href = 'RecruiterPage.php'>Back to Recruiter Tools</a>"
?>