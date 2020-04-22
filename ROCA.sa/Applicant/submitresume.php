<?php
session_start();

$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";
 
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
$id = $_SESSION['id'];
$fname = $mysqli->real_escape_string($_POST['fname']);
$lname = $mysqli->real_escape_string($_POST['lname']);
$email = $mysqli->real_escape_string($_POST['email']);
$phone = $mysqli->real_escape_string($_POST['phone']);
$degree = $mysqli->real_escape_string($_POST['degree']);
$uni = $mysqli->real_escape_string($_POST['uni']);
$work = $mysqli->real_escape_string($_POST['work']);

if ($_SESSION['role'] == "emp" or $_SESSION['role'] == "rec")
{
	$query = "UPDATE employee
			SET resume = 'Name: $fname $lname, Email: $email, Phone: $phone, Level of Education: $degree, University: $uni, Work History: $work' 
            WHERE employee_id = '$id'";
}
else if ($_SESSION['role'] == "app")
{
	$query = "UPDATE applicants
			SET resume = 'Name: $fname $lname, Email: $email, Phone: $phone, Level of Education: $degree, University: $uni, Work History: $work' 
            WHERE applicants_id = '$id'";
}	
 
$mysqli->query($query);
$mysqli->close();
echo "<br>";
echo "<h2>Status successfully updated</h2>";
echo "<br>";
echo "<a href = '../MainPage/MainPage.php'>Back to Job Search Page</a>"
?>