<?php
	define("PATH_TO_DB","Events.sqlite");
	
	function open_db(){
		echo(file_exists(PATH_TO_DB));
		if(file_exists(PATH_TO_DB)){
			// open DB
			$db = new PDO('sqlite:' . PATH_TO_DB);
		}
		return $db;
	}
	
	
	function sanitize_string($str){
		$str = urldecode($str); // %20 to space, %7E to ~, etc...
		$str = trim($str); // get rid of leading and trailing spaces
		$str = strip_tags($str); // get rid of HTML and PHP tags
		$str = addslashes($str); // add backslashes to (i.e. escape) quotes
		return $str;
	}
	

?>