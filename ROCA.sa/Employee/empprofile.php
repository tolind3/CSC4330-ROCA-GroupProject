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
$address = $mysqli->real_escape_string($_POST['address']); 
$phone = $mysqli->real_escape_string($_POST['phone']);

if ($_SESSION['role'] == "emp" or $_SESSION["role"] == "rec")
{
	$query = "UPDATE employee
			SET name = '$fname', last_name = '$lname', email = '$email', address = '$address', phone = '$phone'
			WHERE employee_id = $id";
}	
else
{
	$query = "UPDATE applicants
			SET name = '$fname', last_name = '$lname', email = '$email', address = '$address', phone = '$phone'
			WHERE applicants_id = $id";
}
 
$mysqli->query($query);
$mysqli->close();
echo "<br>";
echo "<h2>Profile information updated</h2>";
echo "<br>";
echo "<a href = '../MainPage/MainPage.php'>Back to Job Search Page</a>"
?>