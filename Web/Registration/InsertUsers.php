
<?php
include('.../Login.php');
$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = mysqli_query($conn,"Select applicants_id FROM applicants ORDER BY applicants_id DESC LIMIT 1");
if(!$result){
    echo 'Could not run query' . mysqli_error();
    exit;
}

$row=mysqli_fetch_row($result);
$row[0];

$sql = "INSERT INTO applicants (name, last_name, resume, statusOfApplication, password, email, phonenumber,gender)
VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','NULL','NULL','".$_POST["password"]."','".$_POST["email"]."','".$_POST["txtEmpPhone"]."','MALE')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: http://192.168.64.2/Web/MainPage/MainPage.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>