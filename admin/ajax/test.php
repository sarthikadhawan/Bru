
<?php
// This is the data you want to pass to Python
$data = array('as', 'df', 'gh');

// Execute the python script with the JSON data
$result = shell_exec('python /home/ubuntu/admin/ajax/test.py ');

// Decode the result
$resultData = json_decode($result, true);

// This will contain: array('status' => 'Yes!')
var_dump($resultData);
?>




