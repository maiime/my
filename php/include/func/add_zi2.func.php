<?php 
	function add_zi2($md5,$word,$str){
		$mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
		if ($mysqli->connect_errno) {
			die($mysqli->connect_error);
		}
		$mysqli->query(UTF8);
		$sql = "SELECT * FROM zi WHERE md5 = '$md5'";
		$result1 = $mysqli->query($sql);
		$arr = $result1->fetch_assoc();
        if(count($arr)==0){
            $sql = "INSERT INTO zi (md5,word,str)VALUES ('$md5','$word','$str')";
            $mysqli->query($sql);
		    $mysqli->close();
            return 1;
        }else{
		    $mysqli->close();
            return "内容已存在";
        }
	}
 ?>