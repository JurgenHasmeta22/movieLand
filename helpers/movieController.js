function fetchMovies() {
  $.ajax({
    url: '../controllers/movies/getMovies.php',
    type: 'GET',
    success: function(response) {
      const movies = JSON.parse(response);
      console.log(movies);
      // let template = '';
      // tasks.forEach(task => {
      //   template += `
      //           <tr taskId="${task.id}">
      //           <td>${task.id}</td>
      //           <td>
      //           <a href="#" class="task-item">
      //             ${task.name} 
      //           </a>
      //           </td>
      //           <td>${task.description}</td>
      //           <td>
      //             <button class="task-delete btn btn-danger">
      //              Delete 
      //             </button>
      //           </td>
      //           </tr>
      //         `
      // });
      // $('#tasks').html(template);
    }
  });
}

function fetchMovie() {
  // let movieId = $(this).val();
  // $.ajax({
  //   type: "POST",
  //   url: location.origin + "/movieLandProject/controllers/movies.php?movieId=" + movieId,
  //   success: function (response) {
  //     let res = jQuery.parseJSON(response);
  //     if (res.status == 404) {
  //       alert(res.message);
  //     } else if(res.status == 200) 
  //     {
  //       // console.log(res) 
  //       // $('#view_name').text(res.data.name);
  //     }
  //   }
  // });
  const id = 5;
  $.post('../controllers/movies/getMovieById.php', {id}, (response) => {
    const movie = JSON.parse(response);
    console.log(movie);
  });
}

$(document).on('submit', '#createMovie', function (e) {
  e.preventDefault();
  let formData = new FormData(this);
  formData.append("createMovie", true);
  $.ajax({
    type: "POST",
    url: "../controllers/movies.php",
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
});

$(document).ready(function(){
  fetchMovies();
  fetchMovie();
});