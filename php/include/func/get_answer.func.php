<?php 
    function get_answer($md5,$q){
        $mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
        if ($mysqli->connect_errno) {
            die($mysqli->connect_error);
        }
        $mysqli->query(UTF8);
        $sql = "SELECT * FROM question_bank WHERE md5 = '$md5'";
        $result1 = $mysqli->query($sql);
        $arr = $result1->fetch_assoc();
        if(count($arr)==0){
            $sql = "INSERT INTO question_bank (md5,question)VALUES ('$md5','$q')";
            $mysqli->query($sql);
		    $mysqli->close();
            return 0;
        }else{
            $count = $arr['count'];
            $count++;
            $sql = "UPDATE question_bank SET count = '$count' WHERE md5 = '$md5'";
            $mysqli->query($sql);
            $mysqli->close();
            return json_encode($arr);
        }
    }
 ?>