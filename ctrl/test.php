<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Process-Data");
if (isset($_FILES["cv"])) {
    $target_dir = "../attachements/";
    $target_file = $target_dir . basename($_FILES["cv"]["name"]);
    file_put_contents($target_file, file_get_contents($_FILES['cv']['tmp_name']));
}
?>