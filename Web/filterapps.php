<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Applicant ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Resume</th><th>Status of Application</th></tr>";

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
$mysqli = new mysqli($servername, $username, $password, $dbname);
$jid = $mysqli->real_escape_string($_POST['jid']);
$keyword = $mysqli->real_escape_string($_POST['keyword']);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT application_list.applicant_id, name, last_name, email, phonenumber, resume, statusOfApplication FROM applicants, application_list WHERE applicants.applicants_id = application_list.applicant_id AND resume LIKE '%$keyword%' AND application_list.job_id = $jid");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
echo "<br>";
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
echo "<a href = 'RecruiterPage.html'>Back to Recruiter Tools</a>"
?>