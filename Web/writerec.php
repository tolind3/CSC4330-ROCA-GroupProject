<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);

$super = $mysqli->real_escape_string($_POST['super_eid']); 
$eid = $mysqli->real_escape_string($_POST['eid']); 
$rec = $mysqli->real_escape_string($_POST['rec']);
 
$query = "UPDATE employee SET recommendation = '$rec' WHERE employee_id = $eid";
$mysqli->query($query);

$query = "DELETE FROM recommendations WHERE eid = $eid AND super_eid = $super";
$mysqli->query($query);

$mysqli->close();
echo "<br>";
echo "<h2>Recommendation successfully sent</h2>";
echo "<br>";
echo "<a href = 'MessagePage.html'>Back to Message Manager</a>"
?>