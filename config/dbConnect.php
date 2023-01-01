<?php 
	$dbConn = mysqli_connect();
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "movieLandia";
	$dbConn = new mysqli($host, $username, $password, $database);

	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL:". mysqli_connect_error();
	  exit();
	}
?>