<?php 

/*$command = escapeshellcmd('/home/ubuntu/scripts/allocation.py');
$output = shell_exec($command);
echo $output;*/

$result = shell_exec('python /home/ubuntu/admin/ajax/waiting_list.py ');
echo $result;


?>