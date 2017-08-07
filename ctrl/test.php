<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Process-Data");

$target_dir = "../attachements/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
file_put_contents($target_file, file_get_contents($_FILES['file']['tmp_name']));

?>