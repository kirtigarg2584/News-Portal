<?php
/*$localhost="localhost";
$user="root";
$pwd="";
$database="metal_admin";

	mysql_connect($localhost,"$user","$pwd") or die(mysql_error());
	mysql_select_db($database) or die(mysql_error());*/
	$localhost="localhost";
	$user="root";
	$pwd="igdefault";
	$database="news_portal";

	$con = mysql_connect("$localhost","$user","$pwd") or die(mysql_error());
	mysql_select_db($database, $con) or die(mysql_error());
?>
