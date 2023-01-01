<?php
include('../../config/dbConnect.php');

if(isset($_POST['title'])) {
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $videosrc = mysqli_real_escape_string($con, $_POST['videosrc']);
  $photosrc = mysqli_real_escape_string($con, $_POST['photosrc']);
  $trailersrc = mysqli_real_escape_string($con, $_POST['trailersrc']);
  $duration = mysqli_real_escape_string($con, $_POST['duration']);
  $ratingimdb = mysqli_real_escape_string($con, $_POST['ratingimdb']);
  $releaseyear = mysqli_real_escape_string($con, $_POST['releaseyear']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
  $views = mysqli_real_escape_string($con, $_POST['views']);

  $alphanumericPattern = "/^[a-zA-Z\s]+$/";
  $numericPattern = '/^[0-9]+$/';
  $passwordPattern = '/(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}/';

  if ($duration == NULL && !preg_match($numericPattern, $duration)) {
    http_response_code(203);
    $response = array("message" => "Duration must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if ($releaseYear == NULL && !preg_match($numericPattern, $releaseYear)) {
    http_response_code(203);
    $response = array("message" => "ReleaseYear must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if ($description == NULL && !preg_match($numericPattern, $description)) {
    http_response_code(203);
    $response = array("message" => "Description must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if ($views == NULL && !preg_match($numericPattern, $views)) {
    http_response_code(203);
    $response = array("message" => "Views must be numericPattern", "errorMessageId" => "nameMessage");
    echo json_encode($response);
    exit;
  }

  if ($ratingImdb == NULL && !preg_match($numericPattern, $ratingImdb)) {
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

  $query = "INSERT into movie(title, videosrc, photosrc, trailersrc, duration, ratingimdb, releaseyear, description, views) 
  VALUES ('$title', '$videosrc', '$photosrc', '$trailersrc', '$duration', '$ratingimdb', '$releaseyear', '$description', '$views')";
  $result = mysqli_query($connection, $query);

  if($result)
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
?>