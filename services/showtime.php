<?php
session_start();
include('./connect.php');


if (isset($_POST['add_showtime'])) {
  $sh_time = $_POST['sh_time'];
  $movie_id = $_POST['movie_id'];

  $query_insert = "INSERT INTO showtime (sh_movieid,sh_time) VALUES ($movie_id,'$sh_time')";
  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = 'เพิ่ม showtime';
  header('location:./../pages/detailmovie.php?mv_id=' . $movie_id);
}

if (isset($_GET['delete'])) {
  $movie_id = $_GET['mv_id'];
  $sh_id = $_GET['sh_id'];

  $query_delete = "DELETE FROM showtime WHERE sh_movieid = $movie_id AND sh_id = $sh_id";
  mysqli_query($conn, $query_delete);
  $_SESSION['success'] = 'ลบสำเร็จ !';
  header('location:./../pages/detailmovie.php?mv_id=' . $movie_id);
}