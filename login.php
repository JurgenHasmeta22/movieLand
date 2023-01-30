<?php
	session_start();
  include('./config/dbConnect.php');
	
	if (isset($_POST['login'])) {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = "SELECT * FROM user WHERE username='$username' AND passwordi='$password'";
			$result = mysqli_query($con, $query);
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

			if (mysqli_num_rows($result) == 1) {
				$_SESSION['id'] = $rows[0]['id'];
        $_SESSION['username'] = $rows[0]['username'];
				header("location: index.php");
        die();
			}
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
    <div class="login-page-wrapper">
      <div class="left-main-wrapper">
        <img
          class="special-image-1"
          id="login-page-img"
          src="assets/images/netflix.png"
          alt=""
        />
      </div>
      <div class="right-main-wrapper">
        <form id="login-form" method="post">
          <h1>Login</h1>
          <label htmlFor="">
            <input
              type="text"
              name="username"
              placeholder="Enter your username"
              required
            />
          </label>
          <label htmlFor="">
            <input
              type="password"
              name="password"
              placeholder="Enter your password"
              required
            />
          </label>
          <label htmlFor="">
            <button id="button-login" type="submit" name="login"> 
              Login
            </button>
          </label>
          <label id="signup-link-wrapper" htmlFor="">
            Don't have an account?
            <a id="link" href="register.php">
              Sign Up
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