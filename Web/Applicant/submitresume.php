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
$phone = $mysqli->real_escape_string($_POST['phone']);
$degree = $mysqli->real_escape_string($_POST['degree']);
$uni = $mysqli->real_escape_string($_POST['uni']);
$work = $mysqli->real_escape_string($_POST['work']);

// Query to update database 
$query = "UPDATE applicants
			SET resume = 'Name: $fname $lname, Email: $email, Phone: $phone, Level of Education: $degree, University: $uni, Work History: $work' 
            WHERE applicants_id = '$aid'";

// Execute query			
$mysqli->query($query);

// Close connection
$mysqli->close();

// Confirmation message
echo "<br>";
echo "<h2>Status successfully updated</h2>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>