<?php
require_once('config.php');
	$errmsg_arrsize = array();
	$errflagsize = false;

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}


 $rollnum=$_SESSION['SESS_ROLLNUM'];
  $filesize = (filesize($location) * .0009765625) * .0009765625; 
      if ($filesize > 2){
	echo 'Photo Size cannot Exceding More than 2 MB';	
		$errmsg_arrsize[] = 'Photo Size cannot Exceding More than 2 MB';
		$errflagsize = true;
	}
		else
{
    if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);	
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/" . $_FILES["image"]["name"]);
			
			$location="photos/" . $_FILES["image"]["name"];
	
	$save=mysql_query("update members set photo='$location' where RollNumber='$rollnum'");
			if($save) {
			header("location: Image-success.php");
			exit();		}
			else 	{
		die("Query failed");
			}
	}
}
		if($errflagsize) {
		$_SESSION['ERRMSG_ARRSIZE'] = $errmsg_arrsize;
		session_write_close();
		header("location: member_index.php");
		exit();
		}
?>
