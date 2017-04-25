<?php
 include("opendb_metalprice.php");
 $username = $_POST["username"];
 $password = $_POST["password"];
 $login = $_POST["login"];

 if($login == "Login" || $login==1)
 {
$query = "select user_id from user_info1 where user_id LIKE '{$username}' and user_pwd LIKE '{$password}'";
  $result =  mysql_query($query);
  
  
  if(result){
  while($row = mysql_fetch_assoc($result))
	if(isset($row))  {
	   $user_id= $row['user_id'];
	  } else{
	   //header('Location: login.php?status=Login Error : Please Check your User Name and Password!');
	   header('Location: login.php?status=adf');
	  }
  }
  
 if( strcasecmp($user_id,'admin')==0)
 {

  session_start();
 $_SESSION["username"]=$username;
 header('Location: index.php');
 }
 else{
	header('Location: login.php?status=fadfasdfadsfasd'.$user_id);
 }

}

?>