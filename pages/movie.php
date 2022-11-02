<?php
session_start();
include('./../services/connect.php');
require_once('./components/securecheck.php'); ?>
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
          <label for="" class="form-label">Movie Name</label>
          <input type="text" name="movie_name" class="form-control mb-3" id="">
          <label for="" class="form-label">movie_desc</label>
          <textarea name="movie_desc" class="form-control mb-3" id="" cols="30" rows="10"></textarea>
          <label for="" class="form-label">Movie Img</label>
          <input type="file" name="file" class="form-control mb-3" id="">
          <label for="" class="form-label">Movie Type</label>
          <select class="form-control mb-3" name="movie_type" id="">
            <option default>โปรดเลือกประเภทหนัง</option>
            <?php
            require_once('./../services/functions/categorymanager.php');
            while ($result_category = mysqli_fetch_assoc($query_category)) { ?>
              <option value="<?= $result_category['cat_id'] ?>"><?= $result_category['cat_name'] ?></option>
            <?php  } ?>
          </select>
          <input type="submit" value="Add" name="add_movie" class="btn btn-outline-primary">
        </form>
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row mt-1">
      <div class="col-4"></div>
      <div class="col-4">
        <h3>Movie Manager</h3>
        <table class="table">
          <tr>
            <th>รูปหนัง</th>
            <th>ชื่อ</th>
            <th>วันที่เพิ่ม</th>
            <th>จัดการ</th>
          </tr>
          <?php
          require_once('./../services/functions/moviemanager.php');
          while ($result_select = mysqli_fetch_assoc($query_select)) {
          ?>
            <tr>
              <td><img src="./../file/<?= $result_select['movie_file'] ?>" width="200px" alt=""></td>
              <td><?= $result_select['movie_name'] ?></td>
              <td><?= $result_select['movie_timestamp'] ?></td>
              <td><a href="./detailmovie.php?mv_id=<?= $result_select['movie_id'] ?>" class="btn btn-outline-primary">ดูรายละเอียด</a></td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
</body>

</html>