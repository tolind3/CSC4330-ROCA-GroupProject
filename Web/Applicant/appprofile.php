<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);

$aid = $mysqli->real_escape_string($_POST['aid']); 
$fname = $mysqli->real_escape_string($_POST['fname']);
$lname = $mysqli->real_escape_string($_POST['lname']); 
$email = $mysqli->real_escape_string($_POST['email']);
$address = $mysqli->real_escape_string($_POST['address']); 
$phone = $mysqli->real_escape_string($_POST['phone']);
 
$query = "UPDATE applicants
			SET name = '$fname', last_name = '$lname', email = '$email', address = '$address', phonenumber = '$phone'
			WHERE applicants_id = $aid";
 
$mysqli->query($query);
$mysqli->close();
echo "<br>";
echo "<h2>Profile information updated</h2>";
echo "<br>";
echo "<a href = 'MainPage.html'>Back to Job Search Page</a>"
?>