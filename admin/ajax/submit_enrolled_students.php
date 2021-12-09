<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../inc/odb.inc.php";
include "../inc/config.inc.php";

$application_id=$_POST['del_req'];
$room_id=$_POST['del_req_room'];

$myArray = explode(',', $application_id);
$myArray2 = explode(',', $room_id);

$sem=$_SESSION['acadsession'];

foreach( $myArray2 as $value ) {
echo $value;
$sql = "update room set status=0,temp_status=0 where id=$value";
if ($conn->query($sql) === TRUE) {
    echo $sql;

    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}

foreach( $myArray as $value ) {
print_r($value);

$sql = "delete from alloted_students where user_id=$value and acadsession='$sem'";
if ($conn->query($sql) === TRUE) {
    echo $sql;

    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}



$sql = "update request_table set alloted=0,status=0,room_id=0 where status!=2 and user_id=$value and acadsession='$sem'";
if ($conn->query($sql) === TRUE) {
    echo $sql;

    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}



}

$conn->close();

?>