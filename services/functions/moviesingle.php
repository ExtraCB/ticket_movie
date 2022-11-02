<?php
$query_select =  "SELECT * FROM movie WHERE movie_id = $mv_id";
$query_select = mysqli_query($conn, $query_select);
$result_select = mysqli_fetch_assoc($query_select);
