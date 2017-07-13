<?php 
	header("content-type:text/html;charset=utf-8");
	date_default_timezone_set("PRC");
	define("ROOT",dirname(__FILE__));
	set_include_path(".".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/func".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
	include_once "config.php";
	include_once "cURL.php";
	include_once "save_img.func.php";
	include_once "search_answer.func.php";
	include_once "get_one_question.func.php";
	include_once "submit_answer.func.php";
	include_once "add_zi.func.php";
	include_once "create_json.func.php";
	include_once "create_json2.func.php";
	include_once "del_question.func.php";		//删除问题
	include_once "get_answer.func.php";			//获取答案
	include_once "get_zi.func.php";				//获取一个字模
	include_once "zi.func.php";				//获取一个字模
 ?>