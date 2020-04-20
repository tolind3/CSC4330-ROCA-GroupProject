<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '4330project.mysql.database.azure.com');
define('DB_USERNAME', 'ProjectAdmin@4330project');
define('DB_PASSWORD', 'Csc4330project');
define('DB_NAME', 'csc4330project');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>