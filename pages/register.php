<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="./../bs5/css/bootstrap.min.css">
  <script src="./../bs5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="continer">
    <div class="row mt-5">
      <div class="col-4"></div>
      <div class="col-4">
        <?php include('./components/error.php') ?>
        <h3>Register</h3>
        <form action="./../services/login_system.php" method="post">
          <label for="" class="form-label">Username</label>
          <input type="text" name="username" class="form-control mb-3" id="">
          <label for="" class="form-label">Password</label>
          <input type="text" name="password" class="form-control mb-3" id="">
          <label for="" class="form-label">Password-Confirm</label>
          <input type="text" name="password_con" class="form-control mb-3" id="">

          <input type="submit" value="Register" name="register" class="btn btn-outline-primary">
          <a href="./login.php">Login</a>
        </form>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
</body>

</html>