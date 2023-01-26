<?php
  include('./config/dbConnect.php');

  if(isset($_POST['register']) && isset($_POST['username'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $alphanumericPattern = "/^[a-zA-Z\s]+$/";
    $numericPattern = '/^[0-9]+$/';
    $passwordPattern = '/(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}/';

    if ($password == NULL && !preg_match($passwordPattern, $password)) {
      echo("Password must be like the pattern");
    }

    if (
      $username == NULL || 
      $email == NULL || 
      $password == NULL
    )
    {
      echo("All fields must be mandatory.");
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
      echo("Internal server error");
    }

    $rowCheck = mysqli_fetch_assoc($resultCheck);

    if ($rowCheck['email'] == $email) {
      echo("User with that E-Mail already exists");
    }

    $query = "INSERT INTO users (userName, email, password) VALUES ('$username', '$email', '$photoSrc', '$password')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
      echo("User created successfully");
    }
    else
    {
      echo("User not created");
    }
  }
?>

<?php include('includes/header.php'); ?>

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
      <h1>MovieLandia24</h1>
      <label id="username" htmlFor="">
        <input
          type="text"
          placeholder="Enter your username"
          required
        />
      </label>
      <label htmlFor="">
        <input
          type="text"
          id="email"
          placeholder="Enter your email"
        />
      </label>
      <label htmlFor="">
        <input
          type="password"
          name=""
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

<?php include('includes/footer.php'); ?>
