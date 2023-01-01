<?php
include('../../config/dbConnect.php');

$search = $_POST['search'];
if(!empty($search)) {
  $query = "SELECT * FROM user WHERE username LIKE '$search%'";
  $result = mysqli_query($connection, $query);
  
  if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  
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
?>
