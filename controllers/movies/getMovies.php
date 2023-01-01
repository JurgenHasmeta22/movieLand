<?php
require '../../config/dbConnect.php';

$query = "SELECT * FROM movie";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0)
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
  $jsonstring = json_encode($json);
  echo $jsonstring;
}
else
{
  $res = [
    'status' => 404,
    'message' => 'Movies error'
  ];
  echo json_encode($res);
}
?>