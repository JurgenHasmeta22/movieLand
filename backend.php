<?php
include "connect.php";

function printArray($var)
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
	exit();
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

$queryInsert = "INSERT INTO users set 
				name = '".$username."',
				password = '".$password."',
				email = '".$email."',
				";

$resultInsert = mysqli_query($conn, $queryInsert);

if (!$resultInsert){
	echo "error ". mysqli_error($conn);
	exit;
}

$queryUsers = "SELECT * FROM users";
$resultUsers = mysqli_query($conn, $queryUsers);

if (!$resultUsers){
	echo "Error ne databaze ".mysqli_error();
	exit();
}

$users = array();

while ($row = mysqli_fetch_assoc($resultUsers)) {
	$temp = array();
	$temp['id'] = $row['id'];
	$temp['username'] = $row['username'];
	$temp['email'] = $row['email'];
	$users[] = $temp;
}
	printArray($users);
?>