<?php 
	function get_count(){
		$mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
		if ($mysqli->connect_errno) {
			die($mysqli->connect_error);
		}
		$mysqli->query(UTF8);
		$sql = 'SELECT * FROM count WHERE id = 1';
		$result1 = $mysqli->query($sql);
		$arr = $result1->fetch_assoc();
		$count = $arr['count'] + 1;
		$sql = "UPDATE count SET count = '$count' WHERE id = 1";
		$result2 = $mysqli->query($sql);
		$mysqli->close();
		if ($result2) {
			return $count;
		}else{
			return $arr['count'] + 1;
		}
	}

 	function set_count($count){
		$mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
		if ($mysqli->connect_errno) {
			die($mysqli->connect_error);
		}
		$mysqli->query(UTF8);
		$sql = "UPDATE count SET count = '$count' WHERE id = 1";
		$result2 = $mysqli->query($sql);
		$mysqli->close();
		if ($result2) {
			return $count;
		}else{
			return -1;
		}
	}
 ?>