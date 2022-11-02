<?php
session_start();
include('./connect.php');

if (isset($_POST['add_movie'])) {
  $movie_name = $_POST['movie_name'];
  $file = $_FILES['file'];
  $movie_desc = $_POST['movie_desc'];
  $movie_type = $_POST['movie_type'];

  if ($_FILES['file']['name'] != '') {
    $allow = array("jpg", "png", "jpeg");
    $extension = explode(".", $file['name']);
    $fileExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileExt;
    $filePath = "./../file/" . $fileNew;

    if (in_array($fileExt, $allow)) {
      if ($file['size'] > 0 && $file['error'] == 0) {
        move_uploaded_file($file['tmp_name'], $filePath);
      }
    }


    $query_insert = "INSERT INTO `movie`(`movie_name`, `movie_desc`, `movie_file`, `movie_type`) VALUES ('$movie_name','$movie_desc','$fileNew','$movie_type');";
    mysqli_query($conn, $query_insert);


    $_SESSION['success'] = 'เพิ่มหนังสำเร็จ !';
    header('location:./../pages/movie.php');
  }
}


if (isset($_POST['edit_movie'])) {
  $movie_name = $_POST['movie_name'];
  $file = $_FILES['file'];
  $movie_desc = $_POST['movie_desc'];
  $movie_type = $_POST['movie_type'];
  $fileold = $_POST['fileold'];
  $movie_id = $_POST['mv_id'];
  $movie_type_old = $_POST['type_old'];

  if ($movie_type == 0) {
    $movie_typenew = $movie_type_old;
  } else {
    $movie_typenew = $movie_type;
  }


  if ($_FILES['file']['name'] != '') {
    $allow = array("jpg", "png", "jpeg");
    $extension = explode(".", $file['name']);
    $fileExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileExt;
    $filePath = "./../file/" . $fileNew;
    if (in_array($fileExt, $allow)) {
      if ($file['size'] > 0 && $file['error'] == 0) {
        move_uploaded_file($file['tmp_name'], $filePath);
      }
    }
  } else {
    $fileNew = $fileold;
  }

  $query_update = "UPDATE `movie` SET `movie_name`='$movie_name',`movie_desc`='$movie_desc',`movie_file`='$fileNew',`movie_type`='$movie_typenew' WHERE `movie_id` = $movie_id";
  mysqli_query($conn, $query_update);
  $_SESSION['success'] = "แก้ไขสำเร็จ !";
  header('location:./../pages/detailmovie.php?mv_id=' . $movie_id);
}

if (isset($_GET['delete'])) {
  $movie_id = $_GET['mv_id'];

  $query_delete = "DELETE FROM movie WHERE movie_id = $movie_id";
  mysqli_query($conn, $query_delete);
  $_SESSION['success'] = 'ลบสำเร็จ !';
  header('location:./../pages/movie.php');
}