<?php
Class dbObj{
	/* Database connection start */
	var $dbhost = "4330project.mysql.database.azure.com";
	var $username = "ProjectAdmin@4330project";
	var $password = "Csc4330project";
	var $dbname = "csc4330project";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}
?>