<?php 
    function del_question($id){
        $mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
        if ($mysqli->connect_errno) {
            die($mysqli->connect_error);
        }
        $mysqli->query(UTF8);
        $sql = "DELETE from question_bank where id = '$id'";
        $result1 = $mysqli->query($sql);
        $mysqli->close();
        return 1;
    }
 ?>