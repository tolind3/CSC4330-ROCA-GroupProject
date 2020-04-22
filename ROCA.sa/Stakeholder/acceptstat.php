 <?php
echo "<table style='width: 40%; border: solid 1px black;'>";
echo "<tr><th>Company Name</th><th>Percentage of Employees Accepted</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='text-align: center; width:150px;border:1px solid black;'>" . parent::current(). "</td>";
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
    $stmt = $conn->prepare("SELECT company.c_name, COUNT(employee.id_number) * 100 / (SELECT COUNT(*) FROM employee WHERE statusOfApplication = 'Accepted')
FROM employee_applications
LEFT JOIN employee ON employee_applications.employee_id = employee.employee_id
LEFT JOIN company ON employee.id_number = company.id_number
WHERE employee.statusOfApplication = 'Accepted'
GROUP BY company.c_name
ORDER BY COUNT(employee.id_number) * 100 / (SELECT COUNT(*) FROM employee WHERE statusOfApplication = 'Accepted') DESC;");
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
echo "<a href = 'StakeholderPage.html'>Back to Stakeholder Reports</a>"
?>