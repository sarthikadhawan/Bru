<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../inc/odb.inc.php";
include "../inc/config.inc.php";
header("Location:../_payment_settings.php");
 
$singles=$_POST['singles'];
$doubles=$_POST['doubles'];
$dormitorys=$_POST['dormitorys'];
$triples=$_POST['triples'];
$phds=$_POST['phds'];

// $singlem=$_POST['singlem'];
// $doublem=$_POST['doublem'];
// $dormitorym=$_POST['dormitorym'];
// $triplem=$_POST['triplem'];
$phdm=$_POST['phdm'];


$name= "SELECT * from room_price";
$received_requests_result2= mysqli_query($conn,$name);
$received_requests_row_count=mysqli_num_rows($received_requests_result2);
if($received_requests_row_count>0)
{
    while ( $row2 = mysqli_fetch_assoc($received_requests_result2))
    {
        if($row2['room_type']=='single')
        $s=1;
        else if ($row2['room_type']=='double')
        $d=1;
        else if ($row2['room_type']=='triple')
        $t=1;
        else if ($row2['room_type']=='dormitory')
        $do=1;
        else if ($row2['room_type']=='Phd Married')
        $p=1;
    }
}



$room='single';
if($s==0)
{
// $stmt = $conn->prepare("INSERT INTO room_price (room_type,monthly_price,semester_price) VALUES (?,?, ?)");
// $stmt->bind_param("sii",$room,$singlem,$singles);

$stmt = $conn->prepare("INSERT INTO room_price (room_type,semester_price) VALUES (?,?)");
$stmt->bind_param("sii",$room,$singles);

$stmt->execute();
$stmt->close();
}
else
{
    // if($singlem=='')
    // $singlem=0;
    if($singles=='')
    $singles=0;
    //$sql = "update room_price set monthly_price={$singlem} , semester_price=9 where room_type=single";
    $sql = "update room_price set semester_price={$singles} where room_type=single";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$room='double';
if($d==0)
{
$stmt = $conn->prepare("INSERT INTO room_price (room_type,semester_price) VALUES (?,?)");
$stmt->bind_param("sii", $room,$doubles);

$stmt->execute();
$stmt->close();
}
else
{
    // if($doublem=='')
    // $doublem=0;
    if($doubles=='')
    $doubles=0;
    //$sql = "update room_price set monthly_price={$doublem} , semester_price={$doubles} where room_type='double'";
    $sql = "update room_price set semester_price={$doubles} where room_type='double'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$room='triple';
if($t==0)
{
$stmt = $conn->prepare("INSERT INTO room_price (room_type,semester_price) VALUES (?,?)");
$stmt->bind_param("sii", $room,$triples);

$stmt->execute();
$stmt->close();
}
else
{
    // if($triplem=='')
    // $triplem=0;
    if($triples=='')
    $triples=0;
    //$sql = "update room_price set monthly_price={$triplem} , semester_price={$triples} where room_type='triple'";
    $sql = "update room_price set  semester_price={$triples} where room_type='triple'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


$room='dormitory';
if($do==0)
{
$stmt = $conn->prepare("INSERT INTO room_price (room_type,semester_price) VALUES (?,?)");
$stmt->bind_param("sii", $room,$dormitorys);

$stmt->execute();
$stmt->close();
}
else
{
    // if($dormitorym=='')
    // $dormitorym=0;
    if($dormitorys=='')
    $dormitorys=0;
   // $sql = "update room_price set monthly_price={$dormitorym} , semester_price={$dormitorys} where room_type='dormitory'";
    $sql = "update room_price set  semester_price={$dormitorys} where room_type='dormitory'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$room='Phd Married';
if($p==0)
{
$stmt = $conn->prepare("INSERT INTO room_price (room_type,monthly_price,semester_price) VALUES (?,?, ?)");
$stmt->bind_param("sii", $room,$phdm,$phds);

$stmt->execute();
$stmt->close();
}
else
{
    if($phdm=='')
    $phdm=0;
    if($phds=='')
    $phds=0;
    $sql = "update room_price set monthly_price={$phdm} , semester_price={$phds} where room_type='Phd Married'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
