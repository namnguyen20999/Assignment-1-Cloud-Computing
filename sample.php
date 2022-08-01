<?php
echo 'Content written:<br/>';
 
$s = file_get_contents('gs://test-project-01/message.txt');
 
echo $s;
?>
