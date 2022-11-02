<?php
session_start();
include('./../services/connect.php');
require_once('./components/securecheck.php');


if (isset($_GET['mv_id'])) {
  $movie_id = $_GET['mv_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include('./components/navbar.php'); ?>

  <div class="container mt-5">
    <div class="row mt-5">
      <div class="col-2"></div>
      <div class="col-8">
        <div class="d-flex">
          <?php
          require_once('./../services/functions/ticketmovie.php'); {
          ?>
          <div class="card me-2 mb-2" style="width:15rem;">
            <img src="./../file/<?= $result_movie_homepage['movie_file'] ?>" alt="" srcset="">
            <div class="card-body">
              <h5 class="card-title"><?= $result_movie_homepage['movie_name'] ?></h5>
              <p class="card-text"><?= $result_movie_homepage['movie_desc'] ?></p>
            </div>
          </div>
          <?php } ?>


          <form action="./../services/ticket.php" method="post">
            <select name="sh_id" id="" class="form-control">
              <option value="">เลือกเวลาที่ต้องการเข้าดู</option>
              <?php while ($result_showtime = mysqli_fetch_assoc($query_showtime)) {
              ?>
              <option value="<?= $result_showtime['sh_id'] ?>"><?= $result_showtime['sh_time'] ?></option>
              <?php } ?>
            </select>


            <input type="submit" class="btn btn-outline-secondary mt-2" name="ticket_submit" value="ยืนยัน">
          </form>

        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

</html>