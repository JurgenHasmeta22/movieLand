<?php
error_reporting(0);
include "connect.php";

if ($_POST['action'] == "signup") {
    $username = mysqli_real_escape_string($dbConn, $_POST["username"]);
    $email = mysqli_real_escape_string($dbConn, $_POST["email"]);
    $password = mysqli_real_escape_string($dbConn, $_POST["password"]);
    $passwordHash = mysqli_real_escape_string($dbConn, password_hash($_POST["password"], PASSWORD_BCRYPT));
    
    $alphanumericPattern = "/^[a-zA-Z\s]+$/";
    $numericPattern = '/^[0-9]+$/';
    $passwordPattern = '/(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}/';

    if (!preg_match($alphanumericPattern, $username)) {
        http_response_code(203);
        $response = array("message" => "Username must be alphanumeric", "errorMessageId" => "surnamenameMessage");
        echo json_encode($response);
        exit;
    }

    $queryCheck = "SELECT id,
                          email
                   FROM users
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

    $queryInsert = "INSERT INTO users 
                    set name = '" . $username . "',
                    email = '" . $email . "',
                    password = '" . $passwordHash . "',
                    created_at = '" . date("Y-m-d H:i:s") . "'
                    ";

    $resultInsert = mysqli_query($dbConn, $queryInsert);

    if (!$resultInsert) {
        http_response_code(203);
        $response = array("message" => "Internal Server Error ".__LINE__);
        echo json_encode($response);
        exit;
    } else {
        http_response_code(200);
        $response = array("message" => "Registration is succesfull");
        echo json_encode($response);
        exit;
    }
}
