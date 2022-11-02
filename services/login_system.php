<?php
include('./connect.php');
session_start();


if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password_con = $_POST['password_con'];

  if ($password != $password_con) {
    $_SESSION['error'] = "รหัสผ่านและรหัสผ่านยืนยันไม่ตรงกัน !";
    header('location:./../pages/register.php');
  } else {

    $query_check = "SELECT * FROM users WHERE user_name = '$username'";
    $result_check = mysqli_query($conn, $query_check);

    if (mysqli_num_rows($result_check) != 0) {
      $_SESSION['error'] = "ชื่อผู้ใช้มีอยู่แล้วในระบบ !";
      header('location:./../pages/register.php');
    } else {
      $query_insert = "INSERT INTO users (user_name,user_password) VALUES ('$username','$password')";
      mysqli_query($conn, $query_insert);
      $_SESSION['success'] = "ลงทะเบียนสำเร็จ !";
      header('location:./../pages/register.php');
    }
  }
}


if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $query_check = "SELECT * FROM users WHERE user_name = '$username' AND user_password = '$password'";
  $result_check = mysqli_query($conn, $query_check);
  $fetch_check = mysqli_fetch_assoc($result_check);

  if (mysqli_num_rows($result_check) != 0) {
    $_SESSION['userid'] = $fetch_check['user_id'];
    $_SESSION['username'] = $fetch_check['user_name'];
    header('location:./../pages/homepage.php');
  } else {
    $_SESSION['error'] = "ไม่พอเจอผู้ใช้ในระบบ  !";
    header('location:./../pages/login.php');
  }
}