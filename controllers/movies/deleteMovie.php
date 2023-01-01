<?php
include('../../config/dbConnect.php');

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($con, $_POST['id']);
  $query = "DELETE FROM movies WHERE id='$movieId'";
  $result = mysqli_query($con, $query);

  if($result)
  {
    $res = [
      'status' => 200,
      'message' => 'Movie deleted successfully'
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 500,
      'message' => 'Movie not deleted'
    ];
    echo json_encode($res);
    return;
  }
}
?>