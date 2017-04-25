<?php 
$uname=$_REQUEST['loginid'];
$uname=str_replace(" ", "", $uname);
$passwd=$_REQUEST['passwd'];



include("opendb_metalprice.php");

$currentdate=date('Y-m-d H:i:s');
$noofdays=0;
$query_datediff="select DATEDIFF(expiry_date,'$currentdate') from customer where login_id='$uname' and password='$passwd'";
$query_res=mysql_query($query_datediff);

//$sel_time = microtime(true);

$row_counter=mysql_num_rows($query_res);

if($row_counter>0)
{
$res_arr=mysql_fetch_row($query_res);
$noofdays=$res_arr[0];
}
else
{
$noofdays="0";
}
mysql_close($success);

echo $noofdays;
?>
