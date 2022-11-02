<?php
include('./../services/connect.php');

session_start();

if (isset($_POST['add_category'])) {
  $cat_name = $_POST['cat_name'];

  $query_insert = "INSERT INTO category (cat_name) VALUES ('$cat_name')";
  mysqli_query($conn, $query_insert);

  $_SESSION['success'] = 'เพิ่ม category สำเร็จ !';
  header('location:./../pages/category.php');
}

if (isset($_GET['delete'])) {
  $cat_id = $_GET['cat_id'];

  $query_delete = "DELETE FROM category WHERE cat_id = $cat_id";
  mysqli_query($conn, $query_delete);
  $_SESSION['success'] = "ลบสำเร็จ !";
  header('location:./../pages/category.php');
}

if (isset($_POST['edit_category'])) {
  $cat_name = $_POST['cat_name'];
  $cat_id = $_POST['cat_id'];


  $query_update = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
  mysqli_query($conn, $query_update);
  $_SESSION['success'] = "แก้ไขสำเร็จ !";
  header('location:./../pages/category.php');
}