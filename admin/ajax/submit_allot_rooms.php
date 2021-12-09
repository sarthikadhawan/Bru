<?php

session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include "../inc/odb.inc.php";
include "../inc/config.inc.php";
header("Location:../_enrolled.php");


$room_number=$_POST['check_list_allot_rooms'];
$userid=$_POST['check_list_allot_rooms_userid'];


$myArray = explode(',', $room_number);
$useridArray=explode(',', $userid);
$total = count($myArray);

$sem=$_SESSION['acadsession'];

                                		
for( $i = 0; $i < $total; $i++ ) {
    
     $f=0;
     $n= "SELECT * from alloted_students where acadsession='$sem' and user_id=$useridArray[$i]";
                                        	
                                    $received_requests_result2= mysqli_query($conn,$n);
                                    $received_requests_row_count=mysqli_num_rows($received_requests_result2);
                                       if($received_requests_row_count>0)
                                       {
                                		while ( $row2 = mysqli_fetch_assoc($received_requests_result2))
                                		{
                                		    $f=1;
                                		    break;
                                		}}   
    if($f==1)
    continue;
    $room_details = explode('_', $myArray[$i]);
    
    if(sizeof($room_details)==4){

    $room_id=(int)$room_details[0];

    $hostel=$room_details[3];

    $room_type=$room_details[2];

    $room_number=$room_details[1];
    echo $room_id;
    
    $sql = "update room set status=1 , temp_status=1 where id=$room_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
  $name= "SELECT * from hostel";
                                        	
                                    $received_requests_result2= mysqli_query($conn,$name);
                                    $received_requests_row_count=mysqli_num_rows($received_requests_result2);
                                       if($received_requests_row_count>0)
                                       {
                                		while ( $row2 = mysqli_fetch_assoc($received_requests_result2))
                                		{
                                		    $hostel_types[$row2['name']]=$row2['id'];
                                		}}   
   
   if ($room_type=='Single')
   $room_typee=1;
   if ($room_type=='Double')
   $room_typee=2;
   if ($room_type=='Triple')
   $room_typee=3;
   if ($room_type=='Dormitory')
   $room_typee=4;
   
   $query = "insert into alloted_students (user_id,room_id,hostel,room_type,room_number,acadsession) values (?,?,?,?,?,?)";
   $stmt = $conn->prepare($query);
   $stmt->bind_param("iissss", $useridArray[$i],$room_id, $hostel_types[$hostel], $room_typee, $room_number,$sem);

   if ($stmt->execute()) { 
   // it worked
   } else {
      print_r($stmt->error);
   }
   
    $sql = "update request_table set alloted=1,room_id=$room_id where user_id=$useridArray[$i]";
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