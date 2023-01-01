<?php
require '../../config/dbConnect.php';

if(isset($_POST['id'])) {
  $id = mysqli_real_escape_string($con, $_POST['id']);
  $query = "SELECT * FROM movie WHERE id='$id'";
  $result = mysqli_query($con, $query);

  if(mysqli_num_rows($result) == 1)
  {
    $json = array();
    while($row = mysqli_fetch_array($result)) {
      $json[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'videosrc' => $row['videosrc'],
        'photosrc' => $row['photosrc'],
        'trailersrc' => $row['trailersrc'],
        'duration' => $row['duration'],
        'ratingimdb' => $row['ratingimdb'],
        'releaseyear' => $row['releaseyear'],
        'description' => $row['description'],
        'views' => $row['views']
      );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
  }
  else
  {
    $res = [
      'status' => 404,
      'message' => 'Movie id not found'
    ];
    echo json_encode($res);
  }
}
?>