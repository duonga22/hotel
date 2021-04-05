<?php
header("Content-type: text/html; charset=utf-8");

$con = mysqli_connect("localhost","root","","hotel") or die($con->mysqli_error);
mysqli_set_charset($con, 'UTF8');
?>