<?php 


$uname=$_REQUEST['loginid'];
$uname=str_replace(" ", "", $uname);
$action=$_REQUEST['action'];
$passwd=$_REQUEST['passwd'];
$imei=$_REQUEST['imei'];
date_default_timezone_set("Asia/Kolkata"); 
$cur_date = date('d-m-Y H:i:s');


//In case of Contact Extraction
$output_str="notnull";
if($action == "login")
{ 
  
     include("opendb_metalprice.php");

     $sql_status="select status from customer where login_id='$uname' and password='$passwd' and imei='$imei'";
     $res_status=mysql_query($sql_status);
     $row_count_status=mysql_num_rows($res_status);
     
     if($row_count_status == 0)
      {
       $output_str = "login_failed";
      }

     else
      { $row_fields=mysql_fetch_row($res_status);
        $row_status=$row_fields[0];

        if($row_status == "0")
          {
           $output_str = "Account_disabled";
          }
        else
          {
           
           $sql_status="update customer set last_seen='$cur_date' where login_id='$uname' and password='$passwd' and imei='$imei'";
           $res_status=mysql_query($sql_status);
           $output_str = "Success"; 
          }
       }
   echo $output_str;
  }
   else
   {
   echo "Wrong_action";
   }
   mysql_close();
 
?>