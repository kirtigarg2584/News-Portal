<?php 

$status=$_REQUEST['status'];
$login_id=$_REQUEST['login_id'];

/*$uname="indulekha";
$imei_number="9876543210";
$devicename="nina";
$action="register";
$passwd="indulekha123";*/


error_reporting(E_ALL);

//In case of Contact Extraction

if(isset($status) && isset($login_id) )
{ 
  
     include("opendb_metalprice.php");
	  
     if($status=="true")
		$sql_status="UPDATE customer SET online = 1 where login_id LIKE '$login_id'";
	 else
     	$sql_status="UPDATE customer SET online = 0 where login_id LIKE '$login_id'";
	 $res_status=mysql_query($sql_status);
    
     
     if(!$res_status)
      {
       $output_str = "server error: db......";
      }

     else
      {       $output_str = "online_status changed to yes";
        }
   print($output_str);
}
   else
   {
   print("Wrong_action");

   }
   mysql_close();
 
?>