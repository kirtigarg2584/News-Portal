<?php 

$devicename=$_REQUEST['device_name'];
$imei_number=$_REQUEST['imei_no'];
$uname=$_REQUEST['loginid'];
$uname=str_replace(" ", "", $uname);
$action=$_REQUEST['action'];
$passwd=$_REQUEST['passwd'];
$cur_date = date('d-m-Y H:i:s');


/*$uname="indulekha";
$imei_number="9876543210";
$devicename="nina";
$action="register";
$passwd="indulekha123";*/


error_reporting(E_ALL);

//In case of Contact Extraction

if($action == "register")
{ 
  
     include("opendb_metalprice.php");

     $sql_status="select status,imei from customer where login_id='$uname' and password='$passwd'";
     $res_status=mysql_query($sql_status);
     $row_count_status=mysql_num_rows($res_status);
     
     if($row_count_status == 0)
      {
       $output_str = "login_failed";
      }

     else
      { $row_fields=mysql_fetch_row($res_status);
        $row_status=$row_fields[0];
        $row_imei=$row_fields[1];

        if($row_imei != "")
          {
           $output_str = "Already_in_use";
          }
        else
          {
           $sql_update="update customer set status='1',device_name='$devicename',imei='$imei_number',last_seen='$cur_date' where login_id='$uname' and password='$passwd'";
           $res_update=mysql_query($sql_update);
           $output_str = "Success"; 
           
          }
       }
   print($output_str);
  }
   else
   {
   print("Wrong_action");
   }
   mysql_close();
 
?>