<?php
    $base64 = $_POST["img_data"];
    $name = $_POST["img_name"];
    $img = base64_decode($base64);
    $result = file_put_contents(('../upload/'.$name.'.jpg'), $img);
    echo 1;
 ?>