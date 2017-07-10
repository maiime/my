<?php 
	function add_zi($md5,$md5_temp,$str){
		$mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
		if ($mysqli->connect_errno) {
			die($mysqli->connect_error);
		}
		$mysqli->query(UTF8);
		$sql = "SELECT * FROM zi_empty WHERE md5 = '$md5'";
		$result1 = $mysqli->query($sql);
		$arr = $result1->fetch_assoc();
        if(count($arr)==0){
            $sql = "INSERT INTO zi_empty (md5,md5_temp,str)VALUES ('$md5','$md5_temp','$str')";
            $mysqli->query($sql);
		    $mysqli->close();
            return 1;
        }else{
		    $mysqli->close();
            return "已存在";
        }
	}
 ?>