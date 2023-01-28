<body>
  <header class="header">
    <div class="header-group-1">
      <a href="http://localhost/movieLandProject/index.php">MovieLand24</a>
      <ul class="list-nav">
        <div class="div-inside-li">
          <img src="assets/logos/ico_filma_blu.png" alt="" />
          <a href="http://localhost/movieLandProject/index.php" class="special-uppercase">
            Movies
          </a>
        </div>
      </ul>
    </div>
    <div class="header-group-2">
      <form
        class="button-search"
      >
        <input
          type="search"
          name="searchMovie"
          placeholder="Search for movies..."
          aria-label="Search through site content"
        />
        <button type="submit">
          <i class="fa fa-search"></i>
        </button>
      </form>
        <?php 	
          session_start();
          if(!isset($_SESSION['id'])) { ?>
            <button
              class="button-login-header"
            >
              <i class="material-icons special-icon">account_circle</i>
              <a href="http://localhost/movieLandProject/login.php">Sign In</a>
            </button>
          <?php } 
          else { ?>
            <span>Welcome <?php if(isset($_SESSION['username'])) echo $_SESSION['username'] ?> </span>
            <a href="http://localhost/movieLandProject/logout.php">Logout</a>
          <?php } 
        ?>
    </div>
  </header>