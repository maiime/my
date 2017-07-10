<?php 
	function save_img($base64,$name)
	{
		$img = base64_decode($base64);
		$result = file_put_contents(('../upload/'.$name.'.jpg'), $img);
		return $result;
	}
 ?>