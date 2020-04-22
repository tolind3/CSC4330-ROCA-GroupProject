<?php
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connection to mysql database
$conn = new mysqli($servername, $username, $password, $dbname);

// Variables received from form
$id = $conn->real_escape_string($_POST['id']); 
$password = $conn->real_escape_string($_POST['password']);

$result = mysqli_query($conn, "SELECT employee_id, role, id_number FROM employee WHERE employee_id = $id AND password = '$password' LIMIT 1");

if($result == null){
    echo 'Could not run query' . mysqli_error();
    exit;
}

$row=mysqli_fetch_row($result);

session_start();
$_SESSION['id'] = $row[0];
$_SESSION['role'] = $row[1];
$_SESSION['comp'] = $row[2];

if ($_SESSION['role'] == "stk")
{
	header("Location: Stakeholder/StakeholderPage.html");
}
else
{
	header("Location: MainPage/MainPage.php");
}

$conn->close();
?>