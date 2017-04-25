<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

$profile_name = $_REQUEST['profile_name'];

$status_current = $_REQUEST['status'];
$active_date = $_REQUEST['active_date'];
$assigned_id = $_REQUEST['assigned_id'];
$datevar         = date("Y-m-d h:i:s ");



if($status_current == '1'){
 $query_update2 = "UPDATE result SET status = '0' , active_date = '$datevar' WHERE   status = '$status_current' AND profile_name =  '$profile_name' AND active_date = '$active_date'";
$result_update2 = mysql_query($query_update2) or die("Error in update2 query");



$query_update2_assign = "UPDATE result_assign SET status = '0'  WHERE  assigned_id  = '$assigned_id'";
$result_update2_assign = mysql_query($query_update2_assign) or die("Error in update2_assign query");
}

if($status_current == '0'){

$query_update2 = "UPDATE result SET status = '1' , active_date = '$datevar' WHERE status = '$status_current' AND profile_name =  '$profile_name' AND active_date = '$active_date' ";
$result_update2 = mysql_query($query_update2) or die("Error in update2 query");

$query_update2_assign = "UPDATE result_assign SET status = '1'  WHERE assigned_id  = '$assigned_id' ";
$result_update2_assign = mysql_query($query_update2_assign) or die("Error in update2_assign query");

}
header("Location: view_result.php");


?>


