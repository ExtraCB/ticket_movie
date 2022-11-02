<?php
session_start();
include('./../services/connect.php');
require_once('./components/securecheck.php');
if (isset($_GET['mv_id'])) {
  $mv_id = $_GET['mv_id'];
  require_once('./../services/functions/moviesingle.php');
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

  <div class="continer">
    <div class="row mt-5">
      <div class="col-4"></div>
      <div class="col-4">
        <?php include('./components/error.php') ?>
        <h3>Movie</h3>
        <form action="./../services/movie.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="mv_id" value="<?= $mv_id ?>">
          <label for="" class="form-label">Movie Name</label>
          <input type="text" name="movie_name" value="<?= $result_select['movie_name'] ?>" class="form-control mb-3"
            id="">
          <label for="" class="form-label">movie_desc</label>
          <textarea name="movie_desc" class="form-control mb-3" id="" cols="30"
            rows="10"><?= $result_select['movie_desc'] ?></textarea>
          <label for="" class="form-label">Movie Img</label>
          <input type="file" name="file" value="<?= $result_select['movie_desc'] ?>" class="form-control mb-3" id="">
          <input type="hidden" name="fileold" value="<?= $result_select['movie_file'] ?>">
          <input type="hidden" name="typeold" value="<?= $result_select['movie_type'] ?>">
          <label for="" class="form-label">Movie Type</label>
          <select class="form-control mb-3" name="movie_type" id="">
            <option default value="<?= $result_select['movie_type'] ?>">โปรดเลือก หากไม่เลือกจะเป็นค่าเดิม</option>
            <?php
            require_once('./../services/functions/categorymanager.php');
            while ($result_category = mysqli_fetch_assoc($query_category)) { ?>
            <option value="<?= $result_category['cat_id'] ?>"><?= $result_category['cat_name'] ?></option>
            <?php  } ?>
          </select>
          <input type="submit" value="Edit" name="edit_movie" class="btn btn-outline-primary">
          <a href="./../services/movie.php?delete=1&mv_id=<?= $mv_id ?>" class="btn btn-danger">Delete</a>
        </form>
      </div>
      <div class="col-4"></div>
    </div>
    <hr>
    <div class="row mt-1">
      <div class="col-4"></div>
      <div class="col-4">
        <h3>Add Showtime</h3>
        <form action="./../services/showtime.php" method="post">
          <label for="" class="label-form">Time</label>
          <input type="time" name="sh_time" class="form-control" id="">
          <input type="hidden" name="movie_id" value="<?= $mv_id ?>">

          <input type="submit" value="Add Showtime" name="add_showtime" class="btn btn-primary mt-3">
        </form>
      </div>
      <div class="col-4"></div>
    </div>
    <hr>
    <div class="row mt-1">
      <div class="col-4"></div>
      <div class="col-4">
        <h3>Movie Showtime</h3>
        <table class="table">
          <tr>
            <th>รหัส sh</th>
            <th>เวลา sh</th>
            <th>จัดการ</th>
          </tr>
          <?php
          require_once('./../services/functions/showtimemanager.php');
          while ($result_select = mysqli_fetch_assoc($query_showtime)) {
          ?>
          <tr>
            <td><?= $result_select['sh_id'] ?></td>
            <td><?= $result_select['sh_time'] ?></td>
            <td><a href="./../services/showtime.php?mv_id=<?= $mv_id ?>&delete=1&sh_id=<?= $result_select['sh_id'] ?>"
                class="btn btn-outline-primary">ลบ</a>
            </td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
</body>

</html>