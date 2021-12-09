<?php 


$db_servername = "ftp.sgp-21.host-webserver.com";
$db_username = "apinet_bru";
$db_password = "54QHbPiF";
$db_name = "apinet_bru";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>