<?php
session_start();

$_SESSION['admin'] = 1;
$_SESSION['id'] = 12;
$_SESSION['name'] = "Ravi Singh";
$_SESSION['picture'] = "";
$_SESSION['email'] = "ravi@iiitd.ac.in";

print_r($_SESSION);

?>