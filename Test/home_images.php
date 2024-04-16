<?php

$dir = "../images/";
$files = scandir($dir);
$images = array_values(array_diff($files, array('..', '.'))); // Remove '.' and '..' entries
echo json_encode($images);

?>
