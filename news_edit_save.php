<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}


include('opendb.php');
$news = $_REQUEST['news'];
$status_current = $_REQUEST['status_current'];
$active_date = $_REQUEST['active_date'];
$current_sno = $_REQUEST['current_sno'];
$datevar         = date("Y-m-d h:i:s ");



 $query = "UPDATE news SET news = '$news',active_date= '$datevar' WHERE   status =  '$status_current' AND active_date = '$active_date' AND sno='$current_sno' ";
$result =  mysql_query($query) or die(mysql_error());
header("Location: view_news.php");


?>

