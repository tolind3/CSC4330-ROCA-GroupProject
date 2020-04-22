<?php
session_start();

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Job ID</th><th>Description</th><th>Status</th><th>Month</th><th>Day</th><th>Year</th><th>Location</th></tr>";

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

$comp = $_SESSION['comp'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT opening_id, description, status, Month, Day, Year, location FROM job_opening WHERE company_id = $comp");
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
echo "<form action = 'changejobstatus.php' method = 'post'>";
echo "<label for = 'jid'>Job ID: </label>";
echo "<input type = 'text' name = 'jid'>";
echo "<br>";
echo "<select name = 'status'>";
echo "<option value = 'Open to Application'>Open to Application</option>";
echo "<option value = 'Closed to Application'>Closed to Application</option>";
echo "</select>";
echo "<br>";
echo "<button type = 'submit'>Change Status</button>";
echo "</form>";
echo "<br>";
echo "<a href = 'RecruiterPage.html'>Back to Recruiter Tools</a>"
?>