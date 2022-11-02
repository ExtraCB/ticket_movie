<?php
session_start();
include('./../services/connect.php');
require_once('./components/securecheck.php');

if (isset($_SESSION['userid'])) {
  $userid = $_SESSION['userid'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History</title>
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
        <h3>History</h3>
        <table class="table">
          <tr>
            <th>รูปหนัง</th>
            <th>ชื่อ</th>
            <th>วันที่จอง</th>
            <th>รอบเวลา</th>
          </tr>
          <?php
          require_once('./../services/functions/history.php');
          while ($result_select = mysqli_fetch_assoc($query_select_history)) {
          ?>
          <tr>
            <td><img src="./../file/<?= $result_select['movie_file'] ?>" width="200px" alt=""></td>
            <td><?= $result_select['movie_name'] ?></td>
            <td><?= $result_select['movie_timestamp'] ?></td>
            <td><?= $result_select['sh_time'] ?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
</body>

</html>