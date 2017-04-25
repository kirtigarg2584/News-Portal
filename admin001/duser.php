<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
include("opendb_metalprice.php");
?>
<?php

	if(isset($_GET['uid'])){
		echo "1";
	
		$un = trim(md5($_GET['uid']));
		
		
		$query = "DELETE FROM user_info1 WHERE user_id = '{$un}'";
		$result = mysql_query($query);
		if ($result) {
			echo "here";
			//header('Location: index.php?status=deleted');
		} else {
			//header('Location: index.php?status=error');
		}
		//mysql_close();
	}

?>
