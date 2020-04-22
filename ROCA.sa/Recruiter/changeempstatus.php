<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
$eid = $mysqli->real_escape_string($_POST['eid']);
$status = $mysqli->real_escape_string($_POST['status']);
 
$query = "UPDATE employee
			SET statusOfApplication = '$status' 
            WHERE employee_id = '$eid'";
 
$mysqli->query($query);
$mysqli->close();

echo "<h2>Status successfully updated</h2>";
echo "<br>";
echo "<a href = 'RecruiterPage.php'>Back to Recruiter Tools</a>"
?>