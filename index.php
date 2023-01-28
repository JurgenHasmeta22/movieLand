<?php
  include('./config/dbConnect.php');
  
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  
  // if (isset($_GET['search'])) {
  //   echo $_GET['search'];
  // }

  $nrOfRecordPerPage = 20;
  $offset = ($page - 1) * $nrOfRecordPerPage; 
  $totalPages = "SELECT COUNT(*) FROM movie";
  $result = mysqli_query($con, $totalPages);
  $totalRows = mysqli_fetch_array($result)[0];
  $totalPages = ceil($totalRows / $nrOfRecordPerPage);
  
  $query = "SELECT * FROM movie LIMIT $offset, $nrOfRecordPerPage";
  $result = mysqli_query($con, $query);
  
  if (mysqli_num_rows($result) > 0) {
    $moviesArray = mysqli_fetch_all($result , MYSQLI_ASSOC);
  } else {
    die();
  }
?>

<?php
  if (isset($_GET['search'])) $search = $_GET['search'];

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

    $query = "SELECT * FROM movie WHERE title LIKE '%$search%' LIMIT $offset, $nrOfRecordPerPage";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
      $moviesArray = mysqli_fetch_all($result , MYSQLI_ASSOC);
    } else {
      die();
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="assets/logos/ico_filma_blu.png" />
    <title>MovieLand24 - Your Movie streaming app of choice</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php include('includes/header.php'); ?>
    <div class="home-wrapper-menus">
      <div class="home-ribbon-2">
        <div class="image-ribbon-2-wrapper">
          <?php foreach($moviesArray as $movie) { ?>
            <div 
              class="movie-item" 
              data-id=<?php echo $movie['id']; ?> 
              onclick="location.href=`/movieLandProject/movieDetails.php?id=<?php echo $movie['id']; ?>`" 
            >
              <img src=<?php echo $movie['photosrc']; ?> />
              <span class="movie-title"><?php echo $movie['title']; ?></span>
              <span class="imdb-span"><?php echo $movie['ratingimdb']; ?></span>
            </div>
          <?php } ?>
        </div>
        <ul class="pagination">
          <a class="nav-link-left nav-link" href="?page=1"><i class="fas fa-angle-double-left"></i></a>
          <a class="nav-link" href="<?php if($page <= 1){echo '#';} else { echo "?page=".$page -1;} ?>"><i class="fas fa-caret-left"></i></a>
          <?php 
            for($i = 1; $i <= $totalPages; $i++) {
              if($page == $i) {
                echo "<a class='active links' href='?page=$i'>".$i."</a>";
              } else{
                echo "<a class='links' href='?page=$i'>".$i."</a>";
              }
            }
          ?>
          <a class="nav-link" href="<?php if($page == $totalPages ) { echo '#'; }else { echo "?page=".$page + 1; } ?>"><i class="fas fa-caret-right"></i></a>
          <a class="nav-link-right nav-link" href="?page=<?php echo $totalPages; ?>"><i class="fas fa-angle-double-right"></i></a>
        </ul>
      </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"
    ></script>
  </body>
</html>