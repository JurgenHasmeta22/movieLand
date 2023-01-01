<?php
require '../config/dbConnect.php';

if(isset($_POST['id'])) {
  $movieId = mysqli_real_escape_string($con, $_POST['id']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (
    $id == NULL || 
    $username == NULL || 
    $email == NULL || 
    $password == NULL
  )
  {
    $res = [
      'status' => 422,
      'message' => 'All fields are mandatory'
    ];
    echo json_encode($res);
    return;
  }

  $query = "UPDATE users SET 
  userName='$username', 
  email='$email', 
  password='$password', 
  WHERE id='$movieId'";

  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
    $res = [
      'status' => 200,
      'message' => 'User updated successfully'
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 500,
      'message' => 'User not updated'
    ];
    echo json_encode($res);
    return;
  }
}
?>