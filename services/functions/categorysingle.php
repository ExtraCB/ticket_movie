<?php
$cat_id = $_GET['cat_id'];

$query_cat = "SELECT * FROM category WHERE cat_id = $cat_id";
$result_cat = mysqli_query($conn, $query_cat);
$fetch_result_cat = mysqli_fetch_assoc($result_cat);
