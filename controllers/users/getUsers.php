<?php
require '../../config/dbConnect.php';

$query = "SELECT * FROM user";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0)
{
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'id' => $row['id'],
      'userName' => $row['userName'],
      'password' => $row['password']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
}
else
{
  $res = [
    'status' => 404,
    'message' => 'Users error'
  ];
  echo json_encode($res);
}
?>