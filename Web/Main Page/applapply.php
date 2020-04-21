<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);

$jid = $mysqli->real_escape_string($_POST['jid']); 
$aid = $mysqli->real_escape_string($_POST['aid']);
 
$query = "INSERT INTO application_list VALUES ($jid, $aid)";
 
$mysqli->query($query);

$query = "UPDATE applicants
SET statusOfApplication = 'Pending'
WHERE applicant_id = $aid";
$mysqli->query($query);
$mysqli->close();
echo "<br>";
echo "<h2>Application successfully submitted</h2>";
echo "<br>";
echo "<a href = 'MainPage.html'>Back to Job Search Page</a>"
?>