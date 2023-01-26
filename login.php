<?php 
  include('./config/dbConnect.php');

	$message = "";
	
	if (isset($_POST['login'])) {
		if (!isset($_SESSION['attempts'])) {
			$_SESSION['attempts'] = 0;
		}

		if ($_SESSION['attempts'] == 3) {
			$message = 'You have tried 3 times to login without success, please try again later.';
		}

		if (isset($_SESSION['attemptsAgain'])) {
			$now = time();

			if ($now >= $_SESSION['attemptsAgain']) {
				unset($_SESSION['attempts']);
				unset($_SESSION['attemptsAgain']);
			}
		}

		if (isset($_POST['username']) && isset($_POST['password']) && $_SESSION['attempts'] < 3) {
			$username = $_POST['username'];
			$password = $_POST['password'];
      // $encryptedPassword = md5($password);
			$query = "SELECT * FROM user WHERE userName='$username' AND password='$password'";
			$result = mysqli_query($con, $query);
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

			if (mysqli_num_rows($result) == 1) {
				$_SESSION['id'] = $rows[0]['id'];
				unset($_SESSION['attempts']);
				header("location: index.php");
				unset($_SESSION['attempts']);
			} else {
				$mesazh = "Data is not valid";
				$_SESSION['attempts'] += 1;
				echo($mesazh);

				if ($_SESSION['attempts'] == 3) {
					$_SESSION['attemptsAgain'] = time() + (5);
				}
			}
		}
	}
  
	mysqli_close($con);
?>

<?php include('includes/header.php'); ?>

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
      <h1>MovieLandia24</h1>
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
        <input id="button-login" type="submit" name="login" value="Login" />
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

<?php include('includes/footer.php'); ?>
