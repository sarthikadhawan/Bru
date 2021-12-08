
<?php
include "../inc/dbo.inc.php";
$q = @$_GET['q'];
$data = [];
$sql = "SELECT a.user_id, b.room_number, c.name AS hostel_name, d.name AS user_name FROM `alloted_students` a INNER JOIN `room` b ON a.room_id = b.id INNER JOIN `hostel` c ON a.hostel = c.id INNER JOIN `student_profile` d ON a.user_id = d.user_id WHERE d.name LIKE '%$q%' GROUP BY a.user_id ORDER BY a.created_at DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
       $data[] = array("name"=>$row["user_name"],"hostel"=>$row["hostel_name"],"room"=>$row["room_number"]);
    }
}
echo json_encode($data);
?>