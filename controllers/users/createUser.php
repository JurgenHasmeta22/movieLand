<?php
include('../../config/dbConnect.php');

if(isset($_POST['email'])) {
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
                  username,
                  email,
                  password
                  FROM user
                  WHERE email = '" . $email ."'
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
      'message' => 'User not created'
    ];
    echo json_encode($res);
    return;
  }
}
?>