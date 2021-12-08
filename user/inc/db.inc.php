<?php 
$db_servername = "ftp.sgp-21.host-webserver.com";
$db_username = "apinet_bru";
$db_password = "54QHbPiF";
$db_name = "apinet_bru";


date_default_timezone_set("Asia/Calcutta");
global $conn;
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

?>