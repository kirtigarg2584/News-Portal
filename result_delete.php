<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}


include('opendb.php');
$profile_name = $_REQUEST['profile_name'];
$status_current = $_REQUEST['status'];
$active_date = $_REQUEST['active_date'];
$assigned_id=$_REQUEST['old_unique_id'];

 $query = "DELETE FROM result WHERE profile_name = '$profile_name' AND status =  '$status_current' AND active_date = '$active_date' AND assigned_id ='$assigned_id'";
$result =  mysql_query($query) or die('could not delete data');

 $query1 = "DELETE FROM result_assign WHERE assigned_id ='$assigned_id'";
$result1 =  mysql_query($query1) or die('could not delete data');
header("Location: view_result.php");


?>

