<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../inc/odb.inc.php";
include "../inc/config.inc.php";

header("Location:../_add_pay_entry.php");



$name=$_POST['name'];
$rollno = $_POST['rollno'];
$mode = $_POST['mode'];
$refno = $_POST['refno'];
$amount= $_POST['amount'];
$date= $_POST['date'];
$comments= $_POST['comments'];
$appname= $_POST['appname'];



$error = [];

$n= "SELECT * from payment_view";
$received_requests_result2= mysqli_query($conn,$n);
$received_requests_row_count=mysqli_num_rows($received_requests_result2);
if($received_requests_row_count>0)
{
    while ( $row2 = mysqli_fetch_assoc($received_requests_result2))
    {
        if($row2['payment_ref']==$refno)
             $error[] = "Duplicate Reference Number";

        
    }
}

$user_id=0;
$n= "SELECT * from student_profile where roll_no='$rollno'";
$received_requests_result2= mysqli_query($conn,$n);
$received_requests_row_count=mysqli_num_rows($received_requests_result2);
if($received_requests_row_count>0)
{
    while ( $row2 = mysqli_fetch_assoc($received_requests_result2))
    {
        $user_id=$row2['id'];

        
    }
}

$n= "SELECT * from application where name='$appname'";
$received_requests_result2= mysqli_query($conn,$n);
$received_requests_row_count=mysqli_num_rows($received_requests_result2);
if($received_requests_row_count>0)
{
    while ( $row2 = mysqli_fetch_assoc($received_requests_result2))
    {
        $app_id=$row2['id'];

        
    }
}

if(strlen($date) < 2){
     $error[] = "Date is Not Correct";
}
if(strlen($name) < 2){
     $error[] = "Name empty";
}if(strlen($rollno) < 2){
     $error[] = "Roll number empty";
}if(strlen($mode) < 2){
     $error[] = "Mode empty";
}
if(strlen($amount) < 2){
     $error[] = "Amount empty";
}
if(strlen($refno) < 1){
     $error[] = "Reference Number empty";
}




if(count($error) == 0){
    
    $stmt = $conn->prepare("INSERT INTO payment_view(user_id,name,roll_number,payment_ref,date,mode,comments,amount,for_application_id) VALUES (?,?,?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssii", $user_id,$name,$rollno, $refno ,$date,$mode,$comments,$amount,$app_id);

    $stmt->execute();
    $stmt->close();


    $conn->close();
 

}
else
{
foreach( $error as $value ) {
echo $value . ",";
}

}
?>