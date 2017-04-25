<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

$customer_name = $_REQUEST['customer_name'];

$status_current = $_REQUEST['status'];
$expiry_date = $_REQUEST['expiry_date'];
$charges_current = $_REQUEST['charges'];
$datevar         = date("Y-m-d h:i:s ");

$current_sno= $_REQUEST['sno'];

if($status_current == '1'){
 $query_update2 = "UPDATE customer SET status = '0' , active_date = '$datevar' WHERE   status = '$status_current' AND customer_name =  '$customer_name' AND charges = '$charges_current' AND expiry_date = '$expiry_date' AND sno = '$current_sno'";
$result_update2 = mysql_query($query_update2) or die("Error in update2 query");
}

if($status_current == '0'){

 $query_update2 = "UPDATE customer SET status = '1' , active_date = '$datevar' WHERE   status = '$status_current' AND customer_name =  '$customer_name' AND charges = '$charges_current' AND expiry_date = '$expiry_date' AND sno = '$current_sno' ";
$result_update2 = mysql_query($query_update2) or die(mysql_error());

}
header("Location: view_client.php");


?>


