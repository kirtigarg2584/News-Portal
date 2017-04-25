<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}


include('opendb.php');
$news = $_REQUEST['news'];
$status_current = $_REQUEST['status'];
$active_date = $_REQUEST['active_date'];
$current_sno = $_REQUEST['current_sno'];

 $query = "DELETE FROM news WHERE news = '$news' AND status =  '$status_current' AND active_date = '$active_date' AND sno='$current_sno' ";
$result =  mysql_query($query) or die('could not delete data');
header("Location: view_news.php");


?>

