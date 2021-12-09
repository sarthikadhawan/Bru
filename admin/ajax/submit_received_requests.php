<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../inc/odb.inc.php";
include "../inc/config.inc.php";

$application_id=$_POST['check_list_allot_rooms'];
$status=$_POST['status'];
//$applicationid=$_POST['applicationid']

$myArray = explode(',', $application_id);
$sem=$_SESSION['acadsession'];
foreach( $myArray as $value ) {
print_r($value);
if($status==0)
{
$sql = "update request_table set status=2 where user_id=$value and acadsession='$sem'";
if ($conn->query($sql) === TRUE) {
    echo $sql;

    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

}

else
{
$sql = "update request_table set status=1 where user_id=$value and acadsession='$sem'";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}
}

$conn->close();

?>