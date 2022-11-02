<?php
session_start();
include('./connect.php');

if (isset($_POST['ticket_submit'])) {
  $sh_id = $_POST['sh_id'];
  $userid = $_SESSION['userid'];

  $query_insert = "INSERT INTO orders (or_ownid,or_showtime) VALUES ($userid,$sh_id)";
  mysqli_query($conn, $query_insert);
  $_SESSION['success'] = 'จองสำเร็จ !';
  header('location:./../pages/history.php');
}