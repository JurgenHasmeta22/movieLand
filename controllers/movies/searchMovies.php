<?php
include('../../config/dbConnect.php');

$search = $_POST['search'];
if(!empty($search)) {
  $query = "SELECT * FROM movie WHERE name LIKE '$search%'";
  $result = mysqli_query($connection, $query);
  
  if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  
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
?>
