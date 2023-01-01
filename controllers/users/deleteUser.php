<?php
include('../../config/dbConnect.php');

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($con, $_POST['id']);
  $query = "DELETE FROM user WHERE id='$id'";
  $result = mysqli_query($con, $query);

  if($result)
  {
    $res = [
      'status' => 200,
      'message' => 'User deleted successfully'
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 500,
      'message' => 'User not deleted'
    ];
    echo json_encode($res);
    return;
  }
}
?>