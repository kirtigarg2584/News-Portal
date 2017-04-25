<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}


include('opendb.php');
$group_name = $_REQUEST['group_name'];
$status_current = $_REQUEST['status'];
$active_date = $_REQUEST['active_date'];


 $query = "DELETE FROM grouptable WHERE group_name = '$group_name' AND status =  '$status_current' AND date = '$active_date' ";
$result =  mysql_query($query) or die(mysql_error());
header("Location: view_group.php");


?>

