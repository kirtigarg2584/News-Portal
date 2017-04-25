<?php
 include("opendb.php");
 $username = $_POST["username"];
 $password = $_POST["password"];
 $login = $_POST["login"];

 if($login == "Login" || $login==1)
 {
$query = "select user_id from user_info1 where user_id LIKE '{$username}' and user_pwd LIKE '{$password}'";
  $result =  mysql_query($query);
  
  
  if(result){
  $row = mysql_fetch_array($result);
	if(isset($row))  {
	   $user_id= $row[0];
	  } else{
	   header('Location: login.php?status=Login Error : Please Check your User Name and Password!');
	  }
  }
  
 if($user_id =='admin')
 {
  $query = "update user_info1 set last_logged_on=now() where user_id='$username'";
  $result =  mysql_query($query);
  session_start();
 // session_register('username');
 $_SESSION["username"]=$username;
 header('Location: index.php');
 }
 
  elseif($user_id =='adminajay')
 {
  $query = "update user_info1 set last_logged_on=now() where user_id='$username'";
  $result =  mysql_query($query);
  session_start();
 
 $_SESSION['username']=$username;
 header('Location: index.php');
 } else{
	header('Location: login.php?status=Login Error : Please Check your User Name and Password!');
 }

}

?>