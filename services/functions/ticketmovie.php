<?php

$query_movie = "SELECT * FROM movie WHERE movie_id = $movie_id";
$query_movie = mysqli_query($conn, $query_movie);
$result_movie_homepage = mysqli_fetch_assoc($query_movie);


$query_showtime = "SELECT * FROM showtime WHERE sh_movieid = $movie_id";
$query_showtime = mysqli_query($conn, $query_showtime);