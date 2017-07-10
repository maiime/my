<?php 
    function create_json(){
        $mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
        if ($mysqli->connect_errno) {
            die($mysqli->connect_error);
        }
        $mysqli->query(UTF8);
        $sql = "SELECT * FROM zi WHERE word is not null";
        $result1 = $mysqli->query($sql);
        // $arr = $result1->fetch_assoc();
        $mysqli->close();
        $obj = array();
        while ($arr = $result1->fetch_assoc()) {
            $obj[$arr['md5']] = $arr['word'];
        }
        $json = json_encode($obj);

        file_put_contents('../data.json', $json);
        // return 1;
    }
 ?>