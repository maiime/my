<?php 
	/*从字模库里面拿到一个未录入的字模*/
    function get_zi(){
        $mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
        if ($mysqli->connect_errno) {
            die($mysqli->connect_error);
        }
        $mysqli->query(UTF8);
        $sql = "SELECT * FROM zi_empty WHERE word is null LIMIT 1";
        $result1 = $mysqli->query($sql);
        $arr = $result1->fetch_assoc();
        $mysqli->close();
        return json_encode($arr);
    }
 ?>