 <?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Company Name</th><th>Status</th></tr>";

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

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT employee.employee_id, employee.name, last_name, company.c_name, statusOfApplication
FROM employee
LEFT JOIN employee_applications ON employee.employee_id = employee_applications.employee_id
LEFT JOIN company ON employee.id_number = company.id_number
WHERE statusOfApplication = 'Accepted'
OR statusOfApplication = 'Pending'");
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
echo "<a href = 'MainPage.html'>Back to Job Search Page</a>"
?>