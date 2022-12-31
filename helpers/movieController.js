$(document).on('submit', '#createMovie', function (e) {
  e.preventDefault();
  let formData = new FormData(this);
  formData.append("createMovie", true);

  $.ajax({
    type: "POST",
    url: "movies.php",
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
  let movieId = $(this).val();

  $.ajax({
    type: "GET",
    url: "movies.php?movieId=" + movieId,
    success: function (response) {
      let res = jQuery.parseJSON(response);

      if (res.status == 404) {
        alert(res.message);
      } else if(res.status == 200) 
      {
        // $('#view_name').text(res.data.name);
        // $('#view_email').text(res.data.email);
        // $('#view_phone').text(res.data.phone);
        // $('#view_course').text(res.data.course);
        // $('#studentViewModal').modal('show');
      }
    }
  });
});

$(document).ready(function(){  
  $.ajax({
    type: "GET",
    url: "movies.php",
    success: function (response) {
      let res = jQuery.parseJSON(response);

      if (res.status == 404) {
        alert(res.message);
      } else if(res.status == 200) 
      {
        // $('#view_name').text(res.data.name);
        // $('#view_email').text(res.data.email);
        // $('#view_phone').text(res.data.phone);
        // $('#view_course').text(res.data.course);
        // $('#studentViewModal').modal('show');
      }
    }
  });
});