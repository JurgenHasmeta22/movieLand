function createUser() {
  let formData = new FormData(this);
  formData.append("createUser", true);

  $.ajax({
    type: "POST",
    url: "users.php",
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

$(document).on('submit', '#createUser', function (e) {
  e.preventDefault();
  createUser();
});