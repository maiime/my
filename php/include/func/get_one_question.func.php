<?php 
    function get_one_question(){
        $mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
        if ($mysqli->connect_errno) {
            die($mysqli->connect_error);
        }
        $mysqli->query(UTF8);
        $sql = "SELECT * FROM question_bank WHERE answer is null LIMIT 1";
        $result1 = $mysqli->query($sql);
        $arr = $result1->fetch_assoc();
        $mysqli->close();
        return json_encode($arr);
    }
 ?>