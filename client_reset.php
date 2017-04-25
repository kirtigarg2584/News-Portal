<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}


include('opendb.php');
$customer_name = $_REQUEST['customer_name'];
$profilename = $_REQUEST['profilename'];


$charges = $_REQUEST['charges'];

$sno= $_REQUEST['sno'];
 $query = "UPDATE customer set status = '0' ,imei = '' WHERE sno = '$sno' AND customer_name =  '$customer_name' AND profilename = '$profilename' AND charges = '$charges'";
$result =  mysql_query($query) or die('could not delete data');
header("Location: view_client.php");


?>

