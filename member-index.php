<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Member Index</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	if( isset($_SESSION['ERRMSG_ARRSIZE']) && is_array($_SESSION['ERRMSG_ARRSIZE']) && count($_SESSION['ERRMSG_ARRSIZE']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARRSIZE'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARRSIZE']);
	}
?>

<form action="addexec.php" method="post" enctype="multipart/form-data" name="addroom">

<h1>Welcome <?php echo $_SESSION['SESS_NAME']. " from ".$_SESSION['SESS_DEPT']. " Department ";?></h1>
<p><a href="member-profile.php">My Profile</a> | <a href="logout.php">Logout</a></p>
<?php /*?><p>
<?php
echo '<div id="imagelist">';
echo '<p><img src="'. $_SESSION['SESS_PHOTO'].'"></p>';
echo '</div>';
?>
</p><?php */?>
 <table>
 <tr>
    <th>Upload Photo </th>
    <td>     
    <input type="file" name="image" class="ed"><br />
    </td>
    </tr>
    
    <tr>
    <th></th>
    <td>  
    <input type="submit" name="Submit" value="Upload" id="button1" />
</td>
</tr>
</table>     

<p>This Page Only accessible to members. </p>
</form>
</body>
</html>
