<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../inc/odb.inc.php";
include "../inc/config.inc.php";
header("Location:../_float_application.php");




$submit_type=$_POST['submit_form'];
    //echo '<script> alert("'.$_SESSION['acadsession'].'")</script>';

$diff=1;
$error = [];

$name='';
if($submit_type!='Delete')
{
    
if (isset($_POST['name'])&&  strlen( $_POST['name'] )) {
$name=$_POST['name'];
if(strlen($name) < 1){
     $error[] = "Enter application name";
}
}

$start_date='';
if (isset($_POST['start_date'])&&  strlen( $_POST['start_date'] )) {

$start_date = $_POST['start_date'];
if(strlen($start_date) < 2){
    $error[] = "Start Date is Not Correct";
}
}

$end_date='';
if (isset($_POST['end_date'])&&  strlen( $_POST['end_date'] )) {

$end_date = $_POST['end_date'];
if(strlen($end_date) < 2){
     $error[] = "End Date is Not Correct";
}


}
//$monthly_price = $_POST['monthly_price'];
//$semester_price = $_POST['semester_price'];

$programs='';
if (isset($_POST['check_list_programs'])&&  sizeof( $_POST['check_list_programs'] )) {

$program=$_POST['check_list_programs'];
$programs = implode (", ", $program);
if(strlen($programs) < 1){
     $error[] = "Choose a program";
}
}

$hostels='';
if (isset($_POST['check_list_hostels'])&&  sizeof( $_POST['check_list_hostels'] )) {
$hostel=$_POST['check_list_hostels'];
$hostels = implode (", ", $hostel);
if(strlen($hostels) < 1){
     $error[] = "Choose a hostel";
}
}

$external_allowed=0;
if (isset($_POST['external_allowed'])) 
$external_allowed=(int)$_POST['external_allowed'];


// print_r($name);
// print_r($start_date);
// print_r($end_date);
// print_r($programs);
// print_r($hostels);




/*if(strlen($monthly_price) < 2){
     $error[] = "Monthly Price is Not Correct";
}

if(strlen($semester_price) < 2){
     $error[] = "Semester Price is Not Correct";
}

if($semester_price<$monthly_price){
     $error[] = "Semester Price is less than Monthly Price";
}*/

if(count($error)==0&&$end_date!=''&&$start_date!=''){
$dateTimestamp1 = strtotime($start_date);
$dateTimestamp2 = strtotime($end_date);
$diff= $dateTimestamp2-$dateTimestamp1;
}
$session="1";

$userids=[];

}

if(count($error) == 0&& $diff>0)
{

        if($submit_type=='Edit'||$submit_type=='Delete')
        {            


        $sem=$_SESSION['acadsession'];
        $n= "SELECT * from application where acadsession='$sem'";
        $received_requests_result2= mysqli_query($conn,$n);
        $received_requests_row_count=mysqli_num_rows($received_requests_result2);
        if($received_requests_row_count>0)
        {
            while ( $row2 = mysqli_fetch_assoc($received_requests_result2))
        {
            $id=$row2['id'];
            // $end=strtotime($row2['end_date']);
            // $start=strtotime($row2['start_date']);
            // if($end_date<$start)
            // print_r('hi');

            if($submit_type=='Edit')
            {           // $sql = "update application set name='$name',start_date='$start_date', end_date='$end_date',  who_program_name='$programs', where_hostel_name='$hostels', external_allowed=$external_allowed where id=$id ";


                        if($name!='')
                        {
                        $sql = "update application set name='$name' where id=$id ";

                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                        }
                        
                         if($start_date!='')
                        {
                        $sql = "update application set start_date='$start_date' where id=$id ";

                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                        }
                        
                         if($end_date!='')
                        {
                        $sql = "update application set end_date='$end_date' where id=$id ";

                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                        }
                        
                         if($programs!='')
                        {
                        $sql = "update application set who_program_name='$programs' where id=$id ";

                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                        }
                        
                         if($hostels!='')
                        {
                        $sql = "update application set where_hostel_name='$hostels' where id=$id ";

                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                        }
                        
                       
                        
            }
            else if($submit_type=='Delete')
            {
                        $sql = "update application set status=2 where id=$id ";
                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                        
                        $sql = "update request_table set status=2 where application_id=$id ";
                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
            }
        }
            
        }
        }

      else{
                                		
            $sql = "update room set status=0,temp_status=0 ";
                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }                  		
            $stmt = $conn->prepare("INSERT INTO application (name,start_date, end_date,  who_program_name, where_hostel_name, session_id, external_allowed,acadsession) VALUES (?,?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("ssssssis", $name,$start_date, $end_date ,$programs, $hostels, $_SESSION['admin'], $external_allowed,$_SESSION['acadsession']);
        
            $stmt->execute();
            $stmt->close();

        }
   
    

   /* $name= "SELECT * from user_group_mapping,user_group where user_group.name=$program and user_group.id=user_group_mapping.user_group_id";
    $received_requests_result2= mysqli_query($conn,$name);
    $received_requests_row_count=mysqli_num_rows($received_requests_result2);
    if($received_requests_row_count>0)
    {
        while ( $row2 = mysqli_fetch_assoc($received_requests_result2))
        {
                 $userids[] = $row2['user_id'];
    
            
        }
    }
    
    for( $i = 0; $i < $userids; $i++ ) {

    $stmt2 = $conn->prepare("INSERT INTO notifications (user_id,description) VALUES (?,?)");
    $desription="Hostel application floated";
    $stmt2->bind_param("is", $userids[$i],$desription);
    
    $stmt2->execute();
    $stmt2->close();
    }*/
    $conn->close();
    
}



?>