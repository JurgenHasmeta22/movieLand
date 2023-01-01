<?php
require '../config/dbConnect.php';

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($con, $_POST['id']);
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $videoSrc = mysqli_real_escape_string($con, $_POST['videoSrc']);
  $photoSrc = mysqli_real_escape_string($con, $_POST['photoSrc']);
  $trailerSrc = mysqli_real_escape_string($con, $_POST['trailerSrc']);
  $duration = mysqli_real_escape_string($con, $_POST['duration']);
  $ratingImdb = mysqli_real_escape_string($con, $_POST['ratingImdb']);
  $releaseYear = mysqli_real_escape_string($con, $_POST['releaseYear']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $views = mysqli_real_escape_string($con, $_POST['views']);

  if (
    $id == NULL || 
    $title == NULL || 
    $videoSrc == NULL || 
    $photoSrc == NULL || 
    $trailerSrc == NULL ||
    $duration == NULL ||
    $ratingImdb == NULL ||
    $releaseYear == NULL ||
    $description == NULL ||
    $views == NULL
  )
  {
    $res = [
      'status' => 422,
      'message' => 'All fields are mandatory'
    ];
    echo json_encode($res);
    return;
  }

  $query = "UPDATE movies SET 
  title='$title', 
  videoSrc='$videoSrc', 
  photoSrc='$photoSrc', 
  trailerSrc='$trailerSrc', 
  trailerSrc='$trailerSrc',
  trailerSrc='$trailerSrc',  
  trailerSrc='$trailerSrc',  
  trailerSrc='$trailerSrc',  
  trailerSrc='$trailerSrc'  
  WHERE id='$id'";

  $result = mysqli_query($con, $query);

  if($result)
  {
    $res = [
      'status' => 200,
      'message' => 'Movie updated successfully'
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 500,
      'message' => 'Movie not updated'
    ];
    echo json_encode($res);
    return;
  }
}
?>