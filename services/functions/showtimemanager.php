<?php
$query_showtime = "SELECT * FROM showtime WHERE sh_movieid = $mv_id";
$query_showtime = mysqli_query($conn, $query_showtime);