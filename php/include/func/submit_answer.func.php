<?php 
    function submit_answer($id,$word){
        $mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
        if ($mysqli->connect_errno) {
            die($mysqli->connect_error);
        }
        $mysqli->query(UTF8);
        $sql = "UPDATE question_bank SET answer = '$word' WHERE id = '$id'";
        $result1 = $mysqli->query($sql);
        $mysqli->close();
        return 1;
    }
 ?>