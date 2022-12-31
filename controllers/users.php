<?php
require './config/dbConnect.php';

if(isset($_GET['getUsers']))
{
  $query = "SELECT * FROM users";
  $query_run = mysqli_query($con, $query);

  if (mysqli_num_rows($query_run) > 0)
  {
    $movies = mysqli_fetch_array($query_run);

    $res = [
      'status' => 200,
      'message' => 'Users successfully fetched',
      'data' => $users
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 404,
      'message' => 'Users error'
    ];
    echo json_encode($res);
    return;
  }
}

if (isset($_POST['createUser']))
{
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $alphanumericPattern = "/^[a-zA-Z\s]+$/";
  $numericPattern = '/^[0-9]+$/';
  $passwordPattern = '/(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}/';

  if ($password == NULL && !preg_match($passwordPattern, $password)) {
    http_response_code(203);
    $response = array("message" => "Password must be passwordPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if (
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

  $queryCheck = "SELECT id,
                  email,
                  phone
                  FROM users
                  WHERE email = '" . $email . "' OR phone = '" . $phone . "'
                ";

  $resultCheck = mysqli_query($dbConn, $queryCheck);

  if (!$resultCheck){
    http_response_code(203);
    $response = array("message" => "Internal Server Error ".__LINE__);
    echo json_encode($response);
    exit;
  }

  $rowCheck = mysqli_fetch_assoc($resultCheck);

  if ($rowCheck['email'] == $email) {
    http_response_code(203);
    $response = array("message" => "User with that E-Mail already exists ", "errorMessageId" => "emailMessage");
    echo json_encode($response);
    exit;
  }

  $query = "INSERT INTO users (userName, email, password) VALUES ('$username', '$email', '$photoSrc', '$password')";
  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
    $res = [
      'status' => 200,
      'message' => 'User created successfully'
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 500,
      'message' => 'Movie not created'
    ];
    echo json_encode($res);
    return;
  }
}

if(isset($_POST['updateUser']))
{
    $movieId = mysqli_real_escape_string($con, $_POST['movieId']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (
      $movieId == NULL || 
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
    username='$username', 
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

if(isset($_GET['getUserById']))
{
  $userId = mysqli_real_escape_string($con, $_GET['userId']);

  $query = "SELECT * FROM users WHERE id='$userId'";
  $query_run = mysqli_query($con, $query);

  if(mysqli_num_rows($query_run) == 1)
  {
    $user = mysqli_fetch_array($query_run);

    $res = [
      'status' => 200,
      'message' => 'User successfully fetched',
      'data' => $user
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 404,
      'message' => 'User id not found'
    ];
    echo json_encode($res);
    return;
  }
}

if(isset($_POST['deleteUser']))
{
  $userId = mysqli_real_escape_string($con, $_POST['userId']);

  $query = "DELETE FROM movies WHERE id='$userId'";
  $query_run = mysqli_query($con, $query);

  if($query_run)
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