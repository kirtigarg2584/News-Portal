<?php
		$localhost="localhost";
$user="indiaping";
$pwd="Newday1234";
$database="indiaping_blkwallet";

	
	$con = mysql_connect("$localhost","$user","$pwd") or die(mysql_error());
	mysql_select_db($database, $con) or die(mysql_error());
?>