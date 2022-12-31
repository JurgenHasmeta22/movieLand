<?php
// $request_body = file_get_contents('php://input');
// $data = json_decode($request_body,true);
error_reporting(0);

include "connect.php";

if ($_POST['action'] == "signup") {
    $name = mysqli_real_escape_string($dbConn, $_POST["name"]);
    $surname = mysqli_real_escape_string($dbConn, $_POST["surname"]);
    $phone = mysqli_real_escape_string($dbConn, $_POST["phone"]);
    $email = mysqli_real_escape_string($dbConn, $_POST["email"]);
    $password = mysqli_real_escape_string($dbConn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($dbConn, $_POST["confirmPassword"]);
    $passwordHash = mysqli_real_escape_string($dbConn, password_hash($_POST["password"], PASSWORD_BCRYPT));
    $alphanumericPattern = "/^[a-zA-Z\s]+$/";
    $numericPattern = '/^[0-9]+$/';
    $passwordPattern = '/(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}/';

    if (!preg_match($alphanumericPattern, $name)) {
        http_response_code(203);
        $response = array("message" => "Name must be alphanumeric", "errorMessageId" => "nameMessage");
        echo json_encode($response);
        exit;
    }

    if (!preg_match($alphanumericPattern, $surname)) {
        http_response_code(203);
        $response = array("message" => "Surname must be alphanumeric", "errorMessageId" => "surnamenameMessage");
        echo json_encode($response);
        exit;
    }

    if (!preg_match($numericPattern, $phone)) {
        http_response_code(203);
        $response = array("message" => "Phone must be a number", "errorMessageId" => "phoneMessage");
        echo json_encode($response);
        exit;
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

    if ($rowCheck['phone'] == $phone) {
        http_response_code(203);
        $response = array("message" => "User with that number already exists", "errorMessageId" => "phoneMessage");
        echo json_encode($response);
        exit;
    }

    $queryInsert = "INSERT INTO users 
                    set name = '" . $name . "',
                    surname = '" . $surname . "',
                    phone = '" . $phone . "',
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
        $response = array("message" => "You registered succesfully on our platform");
        echo json_encode($response);
        exit;
    }
}
