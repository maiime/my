<?php 
	include_once "include/include.php";
	$action = $_POST['action'];
	if($action == 'get_one_question'){
		echo get_one_question();
	}else if($action == 'submit_answer'){
		echo submit_answer($_POST['id'],$_POST['word']);
	}else if($action == 'add_zi'){
		echo add_zi($_POST['md5'],$_POST['md5_temp'],$_POST['data']);
	}else if($action == 'create_json'){
		echo create_json();
	}else if($action == 'del_question'){
		echo del_question($_POST['id']);
	}else if($action == 'get_answer'){
		echo get_answer($_POST['md5'],$_POST['question']);
	}else if($action == 'get_zi'){
		echo get_zi();
	}
 ?>