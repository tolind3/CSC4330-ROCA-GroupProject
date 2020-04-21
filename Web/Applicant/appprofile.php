<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables submitted by form
$aid = $mysqli->real_escape_string($_POST['aid']); 
$fname = $mysqli->real_escape_string($_POST['fname']);
$lname = $mysqli->real_escape_string($_POST['lname']); 
$email = $mysqli->real_escape_string($_POST['email']);
$address = $mysqli->real_escape_string($_POST['address']); 
$phone = $mysqli->real_escape_string($_POST['phone']);

// Query to update database 
$query = "UPDATE applicants
			SET name = '$fname', last_name = '$lname', email = '$email', address = '$address', phonenumber = '$phone'
			WHERE applicants_id = $aid";

// Execute query
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Profile information updated</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>