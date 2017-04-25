<?php
include("opendb.php");
// get the q parameter from URL
$q=$_REQUEST["q"]; 
$query1 = "SELECT sno FROM customer WHERE login_id = '$q'";
 $result1  = mysql_query($query1) or die(mysql_error());
 $num = mysql_num_rows($result1);
while($row1 = mysql_fetch_array($result1)){
 $login_id = $row1[0];
}

if($num != '0'){
echo "This Login Id is already in use";
//$flag_loginid = 1;

}
else{
//$flag_loginid = 0;
}
?>