<?php
require '../../config/dbConnect.php';

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($con, $_POST['id']);
  $query = "SELECT * FROM user WHERE id='$id'";
  $result = mysqli_query($con, $query);

  if(mysqli_num_rows($result) == 1)
  {
    $json = array();
    while($row = mysqli_fetch_array($result)) {
      $json[] = array(
        'id' => $row['id'],
        'userName' => $row['userName'],
        'password' => $row['password']
      );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
  }
  else
  {
    $res = [
      'status' => 404,
      'message' => 'User id not found'
    ];
    echo json_encode($res);
  }
}
?>