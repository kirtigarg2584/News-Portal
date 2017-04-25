<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

$group_name = $_REQUEST['group_name'];

$status_current = $_REQUEST['group_status'];
$datevar         = date("Y-m-d h:i:s ");



if($status_current == '1'){
$query_update2 = "UPDATE grouptable SET status = '0' , date = '$datevar' WHERE   status = '$status_current' AND group_name =  '$group_name' ";
$result_update2 = mysql_query($query_update2) or die("Error in update2 query");
}

if($status_current == '0'){

$query_update2 = "UPDATE grouptable SET status = '1' , date = '$datevar' WHERE status = '$status_current' AND group_name =  '$group_name' ";
$result_update2 = mysql_query($query_update2) or die("Error in update2 query");

}
header("Location: view_group.php");


?>


