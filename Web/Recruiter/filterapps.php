<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Applicant ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Resume</th><th>Status of Application</th></tr>";

// Class to create html table rows
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "4330project.mysql.database.azure.com";
$username = "ProjectAdmin@4330project";
$password = "Csc4330project";
$dbname = "csc4330project";

// Connect to mysql database
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Variables received from form
$jid = $mysqli->real_escape_string($_POST['jid']);
$keyword = $mysqli->real_escape_string($_POST['keyword']);

// PDO connection to database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // mysql query
	$stmt = $conn->prepare("SELECT application_list.applicant_id, name, last_name, email, phonenumber, resume, statusOfApplication FROM applicants, application_list WHERE applicants.applicants_id = application_list.applicant_id AND resume LIKE '%$keyword%' AND application_list.job_id = $jid");
    $stmt->execute();

    // Display results
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;

echo "<tr><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Resume</th><th>Status of Application</th><th>Recommendation</th></tr>";

// PDO connection to database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // mysql query
	$stmt = $conn->prepare("SELECT employee_applications.employee_id, name, last_name, email, phone, resume, statusOfApplication, recommendation FROM employee, employee_applications WHERE employee.employee_id = employee_applications.employee_id AND resume LIKE '%$keyword%' AND employee_applications.job_id = $jid");
    $stmt->execute();

    // Display results
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
echo "</table>";
echo "<br>";

// Form to change application status of applicant
echo "<form action = 'changestatus.php' method = 'post'>";
echo "<label for = 'aid'>Applicant ID: </label>";
echo "<input type = 'text' name = 'aid'>";
echo "<br>";
echo "<select name = 'status'>";
echo "<option value = 'Accepted'>Accepted</option>";
echo "<option value = 'Pending'>Pending</option>";
echo "<option value = 'Rejected'>Rejected</option>";
echo "</select>";
echo "<br>";
echo "<button type = 'submit'>Change Status</button>";
echo "</form>";
echo "<br>";

// Form to change application status of employee
echo "<form action = 'changeempstatus.php' method = 'post'>";
echo "<label for = 'eid'>Employee ID: </label>";
echo "<input type = 'text' name = 'eid'>";
echo "<br>";
echo "<select name = 'status'>";
echo "<option value = 'Accepted'>Accepted</option>";
echo "<option value = 'Pending'>Pending</option>";
echo "<option value = 'Rejected'>Rejected</option>";
echo "</select>";
echo "<br>";
echo "<button type = 'submit'>Change Status</button>";
echo "</form>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>