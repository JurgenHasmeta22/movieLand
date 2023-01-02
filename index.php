<div class="home-wrapper-menus">
<?php include('./includes/header.php'); ?>
<!-- {(params.query === undefined || params.query.length === 0) &&
movies[0]?.title !== undefined ? ( -->
  <div class="home-ribbon-1">
    <!-- <Carousel views={images} /> -->
  </div>
<!-- ) : null} -->
<div class="home-ribbon-2">
  <!-- {params.query ? ( -->
    <span class="movie-count-span">
      Total movies: {moviesCountSearch}{" "}
    </span>
  <!-- ) : ( -->
    <span class="movie-count-span">
      Total movies: {moviesCount?.count}{" "}
    </span>
  )}
  <!-- {params.query === undefined || params.query.length === 0 ? ( -->

      <h3>Sort By: </h3>
      <ul class="list-sort">
        <a to="/movies/sortBy/views">Most viewed (Desc)</a>
        <a to="/movies/sortBy/ratingImdb">Imdb rating (Desc)</a>
        <a to="/movies/sortBy/title">Title (Desc)</a>
      </ul>
  <!-- ) : null}
  {movies?.length !== 0 ? ( -->
    <div class="image-ribbon-2-wrapper">
      <!-- {movies?.map((movie: any) => ( -->
        <div
          class="movie-item"
        >
          <img src={movie.photoSrc} />
          <span class="movie-title">{movie.title}</span>
          <div class="genres-holder-span">
            <!-- {movie.genres.map((genre: any) => ( -->
              <span
                key={genre.genre.name}
              >
                {genre.genre.name}
              </span>
            <!-- ))} -->
          </div>
          <span class="imdb-span">
            <!-- {movie.ratingImdb !== 0
              ? "Imdb: " + movie.ratingImdb
              : "Imdb: " + "N/A"} -->
          </span>
        </div>
      <!-- ))} -->
    </div>
  <!-- ) : ( -->
    <div class="no-search">
      <span>No Search Result, no movie found with that criteria.</span>
    </div>
  <!-- )} -->
</div>
<?php include('./includes/footer.php'); ?>
</div>