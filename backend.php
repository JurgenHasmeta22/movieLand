<?php
include "connect.php";

function printArray($var)
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
	exit();
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

$queryInsert = "INSERT INTO users set 
				name = '".$name."',
				surname = '".$surname."',
				email = '".$email."',
				created_at = '".date("Y-m-d H:i:s")."'
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
	$temp['name'] = $row['name'];
	$temp['surname'] = $row['surname'];
	$temp['birthday'] = $row['birthday'];
	// $users[$row['id']]['id'] = $row['id'];
	// $users[$row['id']]['name'] = $row['name'];
	// $users[$row['id']]['surname'] = $row['surname'];
	// $users[$row['id']]['birthday'] = $row['birthday'];
	$users[] = $temp;
}
	printArray($users);
?>