<?php
$file = fopen('gs://test-project-01/message.txt', 'a+');
 
fwrite($file, 'Hello buckets');
 
fclose($file);
 
echo 'Data written';