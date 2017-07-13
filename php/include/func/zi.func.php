<?php 
    function lu_ti($md5,$question,$answer){
        $mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
        if ($mysqli->connect_errno) {
            die($mysqli->connect_error);
        }
        $mysqli->query(UTF8);
		$sql = "SELECT * FROM question_bank2 WHERE md5 = '$md5'";
		$result1 = $mysqli->query($sql);
		$arr = $result1->fetch_assoc();
        if(count($arr)==0){
            $sql = "INSERT INTO question_bank2 (md5,question,answer)VALUES ('$md5','$question','$answer')";
            $mysqli->query($sql);
		    $mysqli->close();
            return 1;
        }else{
            $mysqli->close();
            return 0;
        }
    }
 ?>