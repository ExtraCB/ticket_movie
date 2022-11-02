<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'pls login !';
  header('location:./login.php');
}