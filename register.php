<?php
  include('./config/dbConnect.php');

  if(isset($_POST['register']) && isset($_POST['username'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $queryCheck = "SELECT id,
                    username,
                    email,
                    passwordi
                    FROM user
                    WHERE email = '" . $email ."'
                  ";

    $resultCheck = mysqli_query($con, $queryCheck);

    if (!$resultCheck){
      echo("Internal server error");
    }

    $rowCheck = mysqli_fetch_assoc($resultCheck);

    if (isset($rowCheck['email']) &&  $rowCheck['email'] == $email) {
      echo("User with that E-Mail already exists");
    }

    $query = "INSERT INTO user (userName, email, passwordi) VALUES ('$username', '$email', '$password')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
      echo("User created successfully");
      header("Location: login.php");
    }
    else
    {
      echo("User not created");
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="assets/logos/ico_filma_blu.png" />
    <title>MovieLand24 - Your Movie streaming app of choice</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="signup-page-wrapper">
      <div class="left-main-wrapper">
        <img
          class="special-image-2"
          id="signup-page-img"
          src="assets/images/netflix.png"
          alt=""
        />
      </div>
      <div class="right-main-wrapper">
        <form
          id="signup-form"
          method="post"
        >
          <h1>Register</h1>
          <label id="username" htmlFor="">
            <input
              type="text"
              name="username"
              placeholder="Enter your username"
              required
            />
          </label>
          <label htmlFor="">
            <input
              type="text"
              id="email"
              name="email"
              placeholder="Enter your email"
            />
          </label>
          <label htmlFor="">
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Enter your password"
              required
            />
          </label>
          <label htmlFor="">
            <button name="register" type="submit">Register</button>
          </label>
          <label id="login-link-wrapper" htmlFor="">
            You have an account?
            <a id="link" href="login.php">
              Login
            </a>
          </label>
        </form>
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"
    ></script>
  </body>
</html>