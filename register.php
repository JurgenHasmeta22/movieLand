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
        <button>Register</button>
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
