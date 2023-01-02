<div class="home-wrapper-menus">
  <?php include('includes/header.php'); ?>
  <div class="home-ribbon-2">
    <h3>Sort By: </h3>
    <ul class="list-sort">
      <a id="views">Most viewed (Desc)</a>
      <a>Imdb rating (Desc)</a>
      <a>Title (Desc)</a>
    </ul>
    <div class="image-ribbon-2-wrapper">
    </div>
  </div>
  <?php include('includes/footer.php'); ?>
</div>

<script type="text/javascript" src="helpers/movieController.js"></script>
<script>
  $(document).ready(function(){
    getMovies();
  });
  // $('.movie-item').click(function() {
  //   location.href = "movieDetails.php?movieId="+$(this).attr('data-id');
  // })
  // $('.views').click(function() {
  //   location.href = "movieDetails.php?movieId="+$(this).attr('data-id');
  // })
</script>