<?php
	define("PATH_TO_DB","logs.sqlite3");
	
	function open_db(){
		if(file_exists(PATH_TO_DB)){
			// open DB
			$db = new PDO('sqlite:' . PATH_TO_DB);
		} else {
			try{
				// create the database
				$db = new PDO('sqlite:' . PATH_TO_DB);
		
				// create the 'Triple' table
				$db->exec("CREATE TABLE Triple (id INTEGER PRIMARY KEY, subject, predicate, value, timestamp)");   
			
				// create the 'AuthKey' table
				@$db->exec("CREATE TABLE AuthKey (id INTEGER PRIMARY KEY, username, key)");  
			 
				// insert test data into the table
				@$db->exec("INSERT INTO AuthKey (id, username, key) VALUES ('1', 'testuser', 'testkey')");
			
				echo "Created DB<br>";
			}
			catch(PDOException $e){
				echo 'Exception : ' . $e->getMessage();
			}
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