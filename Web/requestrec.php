<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);

$eid = $mysqli->real_escape_string($_POST['rec_eid']); 
$super = $mysqli->real_escape_string($_POST['super']);
 
$query = "INSERT INTO recommendations VALUES ($eid, $super)";
 
$mysqli->query($query);
$mysqli->close();
echo "<br>";
echo "<h2>Request successfully sent</h2>";
echo "<br>";
echo "<a href = 'MessagePage.html'>Back to Message Manager</a>"
?>