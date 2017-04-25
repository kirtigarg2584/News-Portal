<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");
$user3 = $_SESSION['username'];
$result_text_val = trim($_POST['result_text']);
$result_text_carriage = str_replace("\r", " ", $result_text_val);
$result_text = str_replace("\n", "", $result_text_carriage);
$aa=$_POST['lit'];
//($aa);
 $profile_name=implode(':',$aa);
 $status_current = $_POST['status'];
$active_date = $_POST['active_date'];
$current_sno=$_REQUEST['current_sno'];
$datevar         = date("Y-m-d h:i:s ");
$old_id = $_POST['old_id'];


/*Below code is for deleting the entries from result and result assign table based on assigned_id field of respective tables. */
$query_del1 = "DELETE FROM result WHERE assigned_id = '$old_id' ";
$result_del1 = mysql_query($query_del1) or die("Error in query1");

$query_del2 = "DELETE FROM result_assign WHERE assigned_id = '$old_id' ";
$result_del2 = mysql_query($query_del2) or die("Error in query1");

function newid_generator(){
   
   $newkey = '';
   $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
   $random_string_length=6;
   for ($i = 0; $i < $random_string_length; $i++) {
      $newkey .= $characters[rand(0, strlen($characters) - 1)];
                                                  }
   return $newkey;
                               }
 
   $new_id = newid_generator();


/*$client_query = "update result SET profile_name='$profile_name',result_text='$result_text', status='1',active_date='$datevar' where  sno='$current_sno'";
$result_client_query = mysql_query($client_query) or die(mysql_error());*/



$query="insert into result (sno,result_text,profile_name,status,assigned_id,AddBy) values('','$result_text','$profile_name','1','$new_id','$user3')";
$result=mysql_query($query) or die(mysql_error());
 $last_insertion =  mysql_insert_id();



//$arrlength=count($aa);
$grp_explode = explode(':',$profile_name);
$arrlength = count($grp_explode);

for($x=0;$x<$arrlength;$x++)
  {
  $profile_group1 = $grp_explode[$x];
$query1="insert into result_assign (sno,result_text,profile_name,assigned_id,AddBy) values('','$result_text','$profile_group1','$new_id','$user3')";
$result1=mysql_query($query1) or die(mysql_error());
  }



 

header("Location: result_edit.php?profile_name=$profile_name&status=$status_current&current_sno=$last_insertion&result_text=$result_text&old_unique_id=$new_id");



?>
