<?php
session_start();
include('./../services/connect.php');
require_once('./components/securecheck.php');



if (isset($_GET['edit'])) {
  require_once('./../services/functions/categorysingle.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Category</title>
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
        <h3>Edit Category</h3>
        <form action="./../services/category.php" method="post">
          <label for="" class="form-label">Category name</label>
          <input type="text" name="cat_name" value="<?= $fetch_result_cat['cat_name']  ?>" class="form-control mb-3"
            id="">
          <input type="hidden" name="cat_id" value="<?= $fetch_result_cat['cat_id'] ?>">
          <input type="submit" value="Edit" name="edit_category" class="btn btn-outline-primary">
        </form>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
</body>

</html>