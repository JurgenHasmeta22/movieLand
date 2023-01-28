<?php
  include('../../config/dbConnect.php');

  $search = $_POST['search'];

  if(!empty($search)) {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    
    $nrOfRecordPerPage = 20;
    $offset = ($page - 1) * $nrOfRecordPerPage; 
    $totalPages = "SELECT COUNT(*) FROM movie WHERE title LIKE '$search%'";
    $result = mysqli_query($con, $totalPages);
    $totalRows = mysqli_fetch_array($result)[0];
    $totalPages = ceil($totalRows / $nrOfRecordPerPage);

    $query = "SELECT * FROM movie LIMIT $offset, $nrOfRecordPerPage WHERE title LIKE '$search%'";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) > 0) {
      $moviesArray = mysqli_fetch_all($result , MYSQLI_ASSOC);
    } else {
      die();
    }
  }
?>