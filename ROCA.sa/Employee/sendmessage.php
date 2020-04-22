<?php
session_start();

$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);

$eid = $_SESSION['id']; 
$receiver = $mysqli->real_escape_string($_POST['receiver']);
$message = $mysqli->real_escape_string($_POST['message']);
 
$query = "INSERT INTO messages VALUES ('$eid', '$receiver', '$message')";
 
$mysqli->query($query);
$mysqli->close();
echo "<br>";
echo "<h2>Message successfully sent</h2>";
echo "<br>";
echo "<a href = 'MessagePage.php'>Back to Message Manager</a>"
?>