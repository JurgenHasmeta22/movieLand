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
              src=${movie.videosrc}
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
                <a href=${movie.trailersrc} class="trailer-link">
                  Youtube trailer
                </a>
              </ul>
              <ul class="length">
                <li>Duration: ${movie.duration}</li>
                <li>Year: ${movie.releaseyear}</li>
                <li>
                  Imdb Rating:
                  ${movie.ratingimdb === 0
                    ? "N/A"
                    : movie.ratingimdb}
                </li>
              </ul>
                <button
                  class="button-favorite-add"
                >
                  Add to favorites
                </button>
            </div>
          </div>
        </div>
        <div class="movie-fabula">
          <p id="fabula">${movie.description}</p>
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