<?php
session_start();

$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
$jid = $mysqli->real_escape_string($_POST['jid']);
$status = $mysqli->real_escape_string($_POST['status']);
 
$query = "UPDATE job_opening
			SET status = '$status' 
            WHERE opening_id = '$jid'";
 
$mysqli->query($query);
$mysqli->close();

echo "<h2>Status successfully updated</h2>";
echo "<br>";
echo "<a href = 'RecruiterPage.html'>Back to Recruiter Tools</a>"
?>