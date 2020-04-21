 <?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Job ID</th><th>Description</th><th>Company Name</th><th>Location</th><th>Status</th><th>Month</th><th>Day</th><th>Year</th></tr>";

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
$keyword = $mysqli->real_escape_string($_POST['keyword']);
$location = $mysqli->real_escape_string($_POST['location']);
$degree = $mysqli->real_escape_string($_POST['degree']);

// PDO connection to database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	// mysql query
	$stmt = $conn->prepare("SELECT opening_id, job_opening.description, c_name, location, status, Month, Day, Year FROM job_opening, company WHERE job_opening.company_id = company.id_number AND status LIKE '%open%' AND job_opening.description LIKE '%$keyword%' AND location LIKE '%$location%' AND job_opening.description LIKE '%$degree%' ORDER BY Year DESC, Month DESC, Day DESC");
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

// Form to submit application for employee
echo "<form action = 'apply.php' method = 'post'>";
echo "<label for = 'jid'>Job ID: </label>";
echo "<input type = 'text' name = 'jid'>";
echo "<br>";
echo "<label for = 'eid'>Employee ID: </label>";
echo "<input type = 'text' name = 'eid'>";
echo "<br>";
echo "<button type = 'submit'>Submit Resume</button>";
echo "</form>";
echo "<br>";

// Form to submit application for applicant
echo "<form action = 'applapply.php' method = 'post'>";
echo "<label for = 'jid'>Job ID: </label>";
echo "<input type = 'text' name = 'jid'>";
echo "<br>";
echo "<label for = 'aid'>Applicant ID: </label>";
echo "<input type = 'text' name = 'aid'>";
echo "<br>";
echo "<button type = 'submit'>Submit Resume</button>";
echo "</form>";
echo "<br>";
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>