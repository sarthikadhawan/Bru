<?php 

/*$command = escapeshellcmd('/home/ubuntu/scripts/allocation.py');
$output = shell_exec($command);
echo $output;*/

$item = '1234';
$result = shell_exec("python /home/ubuntu/admin/ajax/allocation.py $item");
echo $result;


?>