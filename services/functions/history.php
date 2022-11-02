<?php
$query_select_history = "SELECT * FROM orders,movie,showtime WHERE or_ownid = $userid AND sh_id = or_showtime AND movie_id = sh_movieid";
$query_select_history = mysqli_query($conn, $query_select_history);