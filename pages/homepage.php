<?php
session_start();
include('./../services/connect.php');
require_once('./components/securecheck.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php'); ?>

  <div class="container mt-5">
    <div class="row mt-5">
      <div class="col-2"></div>
      <div class="col-8">
        <div class="row row-cols-3">
          <?php
          require_once('./../services/functions/moviehomepage.php');
          while ($result_movie_homepage = mysqli_fetch_assoc($query_movie_homepage)) {
          ?>
          <div class="card me-2 mb-2" style="width:15rem;">
            <img src="./../file/<?= $result_movie_homepage['movie_file'] ?>" alt="" srcset="">
            <div class="card-body">
              <h5 class="card-title"><?= $result_movie_homepage['movie_name'] ?></h5>
              <p class="card-text"><?= $result_movie_homepage['movie_desc'] ?></p>
              <a href="./detailticket.php?mv_id=<?= $result_movie_homepage['movie_id'] ?>"
                class="btn btn-outline-primary">จอง</a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>