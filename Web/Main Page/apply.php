<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);

$jid = $mysqli->real_escape_string($_POST['jid']); 
$eid = $mysqli->real_escape_string($_POST['eid']);
 
$query = "INSERT INTO employee_applications VALUES ($jid, $eid)";
 
$mysqli->query($query);

$query = "UPDATE employee
SET statusOfApplication = 'Pending'
WHERE employee_id = $eid";
$mysqli->query($query);
$mysqli->close();
echo "<br>";
echo "<h2>Application successfully submitted</h2>";
echo "<br>";
echo "<a href = 'MainPage.html'>Back to Job Search Page</a>"
?>