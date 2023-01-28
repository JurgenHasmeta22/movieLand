<?php
  include('./config/dbConnect.php');

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM movie WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(mysqli_num_rows($result) == 1) {
      $movieDetails = $rows[0];
    } else {
      die();
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
    <?php include('includes/header.php'); ?>
    <section class="movie-item-wrapper">
      <div class="left-section">
        <div class="video-and-servers">
          <div class="servers">
            <ul class="server-list">
              <li>Movie Server</li>
            </ul>
          </div>
          <div class="video-square">
            <iframe
              src=<?php echo $movieDetails['videosrc']; ?>
              name="movieFrame"
              scrolling="no"
              frameBorder="0"
              height="550px"
              width="850px"
              allowFullScreen
            ></iframe>
          </div>
          <div class="movie-details">
            <div class="movie-specifications">
              <ul class="trailer">
                <li>Trailer: </li>
                <a href=<?php echo $movieDetails['trailersrc']; ?> class="trailer-link">
                  Youtube trailer
                </a>
              </ul>
              <ul class="length">
                <li>Duration: <?php echo $movieDetails['duration']; ?></li>
                <li>Year: <?php echo $movieDetails['releaseyear']; ?></li>
                <li>
                  <?php echo $movieDetails['ratingimdb']; ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="movie-fabula">
          <p id="fabula"><?php echo $movieDetails['description']; ?></p>
        </div>
      </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"
    ></script>
  </body>
</html>