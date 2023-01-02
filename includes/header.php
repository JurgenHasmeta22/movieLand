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
<header class="header">
  <?php
    // $user = 'Brajan2001';
  ?>
  <div class="header-group-1">
    <a href="/movies">MovieLand24</a>
    <ul class="list-nav">
      <div class="div-inside-li">
        <img src="assets/logos/ico_filma_blu.png" alt="" />
        <a href="../movies" class="special-uppercase">
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
      // if ($isset($user)) { 
    ?>      
      <button
        class="button-login-header"
      >
        <i class="material-icons special-icon">account_circle</i>
        Sign In
      </button>
    <?php 
      // } else { 
    ?>
      <!-- <div class="dropdown">
        <li
          class="dropbtn"
        >
          <img src="../assets/avatars/blankavatar.jpg" />
          User22
        </li>
        <div class="dropdown-content">
          <button
            class="log-out"
          >
            <span>Log Out</span>
          </button>
        </div>
      </div> -->
    <?php 
      // } 
    ?>
  </div>
</header>