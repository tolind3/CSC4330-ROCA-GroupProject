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
$phone = $mysqli->real_escape_string($_POST['phone']);
$degree = $mysqli->real_escape_string($_POST['degree']);
$uni = $mysqli->real_escape_string($_POST['uni']);
$work = $mysqli->real_escape_string($_POST['work']);
 
$query = "UPDATE applicants
			SET resume = 'Name: $fname $lname, Email: $email, Phone: $phone, Level of Education: $degree, University: $uni, Work History: $work' 
            WHERE applicants_id = '$aid'";
 
$mysqli->query($query);
$mysqli->close();
echo "<br>";
echo "<h2>Status successfully updated</h2>";
echo "<br>";
echo "<a href = 'MainPage.html'>Back to Job Search Page</a>"
?>