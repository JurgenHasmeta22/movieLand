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
        'id' =>  intval($row['id']),
        'title' => $row['title'],
        'videosrc' => $row['videosrc'],
        'photosrc' => $row['photosrc'],
        'trailersrc' => $row['trailersrc'],
        'duration' =>  intval($row['duration']),
        'ratingimdb' =>  floatval($row['ratingimdb']),
        'releaseyear' =>  intval($row['releaseyear']),
        'description' => $row['description'],
        'views' =>  intval($row['views'])
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