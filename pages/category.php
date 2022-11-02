<?php
session_start();
include('./../services/connect.php');
require_once('./components/securecheck.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category</title>
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
        <h3>Category</h3>
        <form action="./../services/category.php" method="post">
          <label for="" class="form-label">Category name</label>
          <input type="text" name="cat_name" class="form-control mb-3" id="">

          <input type="submit" value="Add" name="add_category" class="btn btn-outline-primary">
        </form>
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row mt-2">
      <div class="col-3"></div>
      <div class="col-6">
        <table class="table">
          <tr>
            <th>รหัสประเภท</th>
            <th>ชื่อ</th>
            <th>วันที่เพิ่ม</th>
            <th>จัดการ</th>
          </tr>

          <?php
          require_once('./../services/functions/categorymanager.php');
          while ($result_category = mysqli_fetch_assoc($query_category)) { ?>
          <tr>
            <td><?= $result_category['cat_id'] ?></td>
            <td><?= $result_category['cat_name'] ?></td>
            <td><?= $result_category['cat_timestamp'] ?></td>
            <td>
              <a class="btn btn-outline-warning"
                href="./editcategory.php?edit=1&cat_id=<?= $result_category['cat_id'] ?>">Edit</a>
              <a class="btn btn-outline-danger"
                href="./../services/category.php?delete=1&cat_id=<?= $result_category['cat_id'] ?>">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <div class="col-3"></div>
    </div>
  </div>
</body>

</html>