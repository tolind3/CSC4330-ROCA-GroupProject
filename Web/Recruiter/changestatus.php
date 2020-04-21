<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
$aid = $mysqli->real_escape_string($_POST['aid']);
$status = $mysqli->real_escape_string($_POST['status']);
 
$query = "UPDATE applicants
			SET statusOfApplication = '$status' 
            WHERE applicants_id = '$aid'";
 
$mysqli->query($query);
$mysqli->close();

echo "<h2>Status successfully updated</h2>";
echo "<br>";
echo "<a href = 'RecruiterPage.html'>Back to Recruiter Tools</a>"
?>