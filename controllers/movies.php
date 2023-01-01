<?php
error_reporting(0);
require '../config/dbConnect.php';

if(isset($_GET['getMovies']))
{
  $query = "SELECT * FROM movies";
  $query_run = mysqli_query($con, $query);

  if (mysqli_num_rows($query_run) > 0)
  {
    $movies = mysqli_fetch_array($query_run);

    $res = [
      'status' => 200,
      'message' => 'Movies successfully fetched',
      'data' => $movies
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 404,
      'message' => 'Movies errpr'
    ];
    echo json_encode($res);
    return;
  }
}

if (isset($_POST['createMovie']))
{
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $videoSrc = mysqli_real_escape_string($con, $_POST['videoSrc']);
  $photoSrc = mysqli_real_escape_string($con, $_POST['photoSrc']);
  $trailerSrc = mysqli_real_escape_string($con, $_POST['trailerSrc']);
  $duration = mysqli_real_escape_string($con, $_POST['duration']);
  $ratingImdb = mysqli_real_escape_string($con, $_POST['ratingImdb']);
  $releaseYear = mysqli_real_escape_string($con, $_POST['releaseYear']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $views = mysqli_real_escape_string($con, $_POST['views']);

  $alphanumericPattern = "/^[a-zA-Z\s]+$/";
  $numericPattern = '/^[0-9]+$/';
  $passwordPattern = '/(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}/';

  if ($duration == NULL && $duration == NULL && !preg_match($numericPattern, $duration)) {
    http_response_code(203);
    $response = array("message" => "Duration must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if ($releaseYear == NULL && $releaseYear == NULL && !preg_match($numericPattern, $releaseYear)) {
    http_response_code(203);
    $response = array("message" => "ReleaseYear must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if ($description == NULL && $description == NULL && !preg_match($numericPattern, $description)) {
    http_response_code(203);
    $response = array("message" => "Description must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if ($views == NULL && $views == NULL && !preg_match($numericPattern, $views)) {
    http_response_code(203);
    $response = array("message" => "Views must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if ($ratingImdb == NULL && $ratingImdb == NULL && !preg_match($numericPattern, $ratingImdb)) {
    http_response_code(203);
    $response = array("message" => "RatingImdb must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if (
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

  $query = "INSERT INTO movies (title, videoSrc, photoSrc, trailerSrc, duration, ratingImdb, releaseYear, description, views) 
    VALUES ('$title', '$videoSrc', '$photoSrc', '$trailerSrc', '$duration', '$ratingImdb', '$releaseYear', '$description', '$views')";
  $query_run = mysqli_query($con, $query);

  if($query_run)
  {
    $res = [
      'status' => 200,
      'message' => 'Movie created successfully'
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 500,
      'message' => 'Movie not created'
    ];
    echo json_encode($res);
    return;
  }
}

if(isset($_POST['updateMovie']))
{
  $movieId = mysqli_real_escape_string($con, $_POST['movieId']);
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
    $movieId == NULL || 
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
  WHERE id='$movieId'";

  $query_run = mysqli_query($con, $query);

  if($query_run)
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

if(isset($_GET['getMovieById']))
{
  $movieId = mysqli_real_escape_string($con, $_GET['movieId']);

  $query = "SELECT * FROM movies WHERE id='$movieId'";
  $query_run = mysqli_query($con, $query);

  if(mysqli_num_rows($query_run) == 1)
  {
    $movie = mysqli_fetch_array($query_run);

    $res = [
      'status' => 200,
      'message' => 'Movie successfully fetched',
      'data' => $movie
    ];
    echo json_encode($res);
    return;
  }
  else
  {
    $res = [
      'status' => 404,
      'message' => 'Movie id not found'
    ];
    echo json_encode($res);
    return;
  }
}

if(isset($_POST['deleteMovie']))
{
  $movieId = mysqli_real_escape_string($con, $_POST['movieId']);

  $query = "DELETE FROM movies WHERE id='$movieId'";
  $query_run = mysqli_query($con, $query);

  if($query_run)
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