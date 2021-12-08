<?php 

include "../inc/dbo.inc.php";

 function getdaytime($conn){
  $a = (int)date('hi', time());
  $c = 0;
  if(($a > 2000 && $a < 2130) || ($a > 730 && $a < 930) || ($a > 1300 && $a < 1430) || ($a > 1700 && $a < 1800) ){
   $c = 1;
  }
  
  $b = 0;
  
  if(($a < 930 && $a > 0) || ($a > 930 && $a < 2359))
   $b = 0;
  if($a < 1430 && $a > 930)
   $b = 1;
  if($a < 1800 && $a > 1430)
   $b = 2;
  if($a < 2130 && $a > 1800)
   $b = 3;

 
  $w =  date('w',time());
  $sql = "SELECT * FROM mess_menu WHERE week_day = $w AND day_time = $b";
  $result = $conn->query($sql);
  $apps = $result->fetch_assoc();
  return array($c,$b, $apps['item']);
  $conn->close();
 }
 
 $mess_d = getdaytime($conn);
 
 
header("Content-Type: application/json");
$r = array("speech"=> $mess_d[2], "displayText"=>$mess_d[2]);
echo json_encode($r);
?>