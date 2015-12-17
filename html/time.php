<?php
header("Access-Control-Allow-Origin：*");
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Taipei');
$showtime = date("Y-m-d H:i:s");
echo $showtime;
?>