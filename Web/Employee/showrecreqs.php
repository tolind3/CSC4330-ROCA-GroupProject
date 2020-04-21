 <?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Employee ID</th><th>Name</th></tr>";

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

// Variable received from form
$eid = $mysqli->real_escape_string($_POST['eid']);

// PDO connection to mysql database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// mysql query
    $stmt = $conn->prepare("SELECT eid, CONCAT(employee.name, ' ', employee.last_name) FROM recommendations LEFT JOIN employee ON recommendations.eid = employee.employee_id WHERE super_eid = $eid");
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

// Form to write recommendation letter
echo "<form action = 'writerec.php' method = 'post'>";
echo "<label for = 'super_eid'>Your Employee ID: </label>";
echo "<input type = 'text' name = 'super_eid'>";
echo "<br>";
echo "<label for = 'eid'>Recommended Employee's ID: </label>";
echo "<input type = 'text' name = 'eid'>";
echo "<br>";
echo "<label for = 'rec'>Recommendation: </label>";
echo "<br>";
echo "<textarea name = 'rec' rows = 10 cols = 30></textarea>";
echo "<br>";
echo "<button type = 'submit'>Submit Recommendation</button>";
echo "</form>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>