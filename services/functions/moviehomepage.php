<?php

$query_movie_homepage = "SELECT * FROM movie WHERE movie_status = 1";
$query_movie_homepage = mysqli_query($conn, $query_movie_homepage);