<?php include('./includes/header.php'); ?>

<section class="movie-item-wrapper">
  <div class="left-section">
    <div class="video-and-servers">
      <div class="servers">
        <ul class="server-list">
          <li>Movie Server</li>
        </ul>
      </div>
      <div class="video-square">
        <!-- <iframe
          src={movieItem?.videoSrc}
          name="movieFrame"
          scrolling="no"
          frameBorder={0}
          height="550px"
          width="850px"
          allowFullScreen
        ></iframe> -->
      </div>
      <div class="movie-details">
        <div class="movie-specifications">
          <ul class="trailer">
            <li>Trailer: </li>
            <a href={movieItem?.trailerSrc} class="trailer-link">
              Youtube trailer
            </a>
          </ul>
          <ul class="length">
            <li>Duration: {movieItem?.duration}</li>
            <li>Year: {movieItem?.releaseYear}</li>
            <li>
              Imdb Rating:{" "}
              {movieItem?.ratingImdb === 0
                ? "N/A"
                : movieItem?.ratingImdb}
            </li>
          </ul>
          <!-- {user?.userName ? ( -->
            <button
              class="button-favorite-add"
            >
              Add to favorites
            </button>
          <!-- ) : null} -->
        </div>
      </div>
    </div>
    <div class="movie-fabula">
      <p id="fabula">{movieItem?.description}</p>
    </div>
    <div class="last movies">
      <div class="posted-lastest">
        <h2>Latest Movies</h2>
      </div>
      <ul class="last-movies-list">
        <!-- {latestMovies.slice(14, 19).map((latestMovie: any) => ( -->
          <li
          >
            <img src={latestMovie.photoSrc} />
          </li>
        <!-- ))} -->
      </ul>
    </div>
  </div>
</section>

<?php include('./includes/footer.php'); ?>