function getMovies() {
  $.ajax({
    url: 'controllers/movies/getMovies.php',
    type: 'GET',
    success: function(response) {
      const movies = JSON.parse(response);
      let template = '';
      movies.forEach(movie => {
        template += `
          <div class="movie-item" data-id=${movie.id}>
            <img src="${movie.photosrc}" />
            <span class="movie-title">${movie.title}</span>
            <div class="genres-holder-span">
            </div>
            <span class="imdb-span">
              ${movie.ratingimdb !== 0
                ? "Imdb: " + movie.ratingimdb
                : "Imdb: " + "N/A"}
            </span>
          </div>
        `
      });
      $('.image-ribbon-2-wrapper').html(template);
    }
  });
}

function getMovie() {
  const id = 5;
  $.post('controllers/movies/getMovieById.php', {id}, (response) => {
    const movie = JSON.parse(response);
    const template = `
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
    `
    $('.left-section').html(template);
  });
}

function createMovie() {
  let formData = new FormData(this);
  formData.append("createMovie", true);

  $.ajax({
    type: "POST",
    url: "controllers/movies.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      let res = jQuery.parseJSON(response);
      if(res.status == 422) {
      } else if(res.status == 200){
      } else if(res.status == 500) {
        alert(res.message);
      }
    }
  });
}

// $(document).on('submit', '#createMovie', function (e) {
//   e.preventDefault();
//   createMovie();
// });
