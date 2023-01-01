<?php include('../includes/header.php'); ?>

<div class="login-page-wrapper">
  <div class="left-main-wrapper">
    <img
      class="special-image-1"
      id="login-page-img"
      src="../assets/images/netflix.png"
      alt=""
    />
  </div>
  <div class="right-main-wrapper">
    <form id="login-form">
      <h1>MovieLandia24</h1>
      <label htmlFor="">
        <input
          type="text"
          name="email"
          placeholder="Enter your email"
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
        <button>Login</button>
      </label>
      <label id="signup-link-wrapper" htmlFor="">
        Don't have an account?
        <a id="link" href="./register.php">
          Sign Up
        </a>
      </label>
    </form>
  </div>
</div>

<?php include('../includes/footer.php'); ?>
