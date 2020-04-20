<?php
if (isset($_REQUEST['attempt'])) {

    $link = mysql_connect('4330project.mysql.database.azure.com', 'ProjectAdmin@4330project', 'Csc4330project') or die('Could not connect to database');
    $user = mysql_real_escape_string($_POST['email']);
    $password = sha1(mysql_real_escape_string($_POST['password']));
    mysqli_select_db('csc4330project');
    $query = mysql_query(
        "SELECT email, password 
        FROM applicants
        WHERE email = '$user' 
        AND password = '$password'
        ") or die(mysql_error());
    mysql_fetch_array($query);
    $total = mysql_num_rows($query);
    if ($total > 0) {
        session_start();
        $_SESSION['email'] = 'blah';
        header('location: dashboard.php');
    }
    else {
        echo '<br>Access denied!';

    }
}


?>