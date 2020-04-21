 <?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Company Name</th><th>Number of Applicants</th></tr>";

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

// PDO connection to database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	// mysql query
	$stmt = $conn->prepare("SELECT company.c_name, COUNT(employee_applications.employee_id)
FROM employee_applications
LEFT JOIN job_opening ON employee_applications.job_id = job_opening.opening_id
LEFT JOIN company ON job_opening.company_id = company.id_number 
GROUP BY company.c_name
ORDER BY COUNT(employee_applications.employee_id) DESC;");
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
echo "<a href = 'http://192.168.64.2/Web/MainPage/MainPage.html'>Back to Main Page</a>"
?>