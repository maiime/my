<?php 
    function create_json2(){
        $mysqli = new mysqli(HOST,USERNAME,PASSWORD,SQL,PORT);
        if ($mysqli->connect_errno) {
            die($mysqli->connect_error);
        }
        $mysqli->query(UTF8);
        $sql = "SELECT * FROM question_bank WHERE answer is not null";
        $result1 = $mysqli->query($sql);
        // $arr = $result1->fetch_assoc();
        $mysqli->close();
        $obj = array();
        while ($arr = $result1->fetch_assoc()) {
            $item = array();
            $item['question'] = $arr['question'];
            $item['answer'] = $arr['answer'];
            $obj[] = $item;
        }
        $json = json_encode($obj);

        file_put_contents('../data2.json', $json);
        // return 1;
    }
 ?>