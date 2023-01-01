<?php
require '../../config/dbConnect.php';

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$nrOfRecordPerPage = 20;
$offset = ($page - 1) * $nrOfRecordPerPage; 
$totalPages = "SELECT COUNT(*) FROM movie";
$result = mysqli_query($con, $totalPages);
$totalRows = mysqli_fetch_array($result)[0];
$totalPages = ceil($totalRows / $nrOfRecordPerPage);

$query = "SELECT * FROM movie LIMIT $offset, $nrOfRecordPerPage";
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