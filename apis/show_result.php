<?php
$login_id=$_REQUEST['loginid'];
include("opendb_metalprice.php");

$sql_profile = "select profilename from customer where login_id='$login_id'";
$result = mysql_query($sql_profile);
$profile_array = mysql_fetch_array($result);
if($profile_array)
{
$profile = $profile_array[0];

$profile_exp = explode(':',$profile);
$price = array();
$result_format = "";
$noofgrps = count($profile_exp);
 if($noofgrps > 1)
   {
    for($i=0;$i<count($profile_exp);$i++)
        {
         $grps .= "'".$profile_exp[$i] . "',";
          
        }
         $group = "(".substr($grps,'0','-1').")";
    }
  else
   {
    $group = "('".$profile."')";
   }


  $sql_price = "select distinct(result_text) from result_assign where profile_name IN $group and status='1'";
  $result_price = mysql_query($sql_price);
  $count_result = mysql_num_rows($result_price);
  while( $row = mysql_fetch_array($result_price))
         {       
         $result_format .= $row[0] ."</br>"; 
         
         }

print($result_format);
}

else
{
print("Incorrect_LoginID");
}
mysql_close();

?>