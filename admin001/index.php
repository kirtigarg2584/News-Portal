<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb_metalprice.php");
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
?>
<?php

	if($_POST['submit']){
		//echo "1";
	
		$un = trim($_POST['uname']);
		$p = trim($_POST['pswd']);
		
		
		
		$query = "INSERT INTO user_info1 (user_id, user_pwd, last_logged_on) VALUES ('{$un}', '{$p}', CURRENT_TIMESTAMP)";
		if (mysql_query($query)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $query . "<br>" . mysql_error($conn);
		}
		//mysql_close();
	} else if(isset($_GET['status'])){
			$msg = $_GET['status'];
			echo "<h2>".$msg."</h2>";
	} 

?>
<html>
<head>
<head>
<body>
<a style="margin: 5px; border:1px dashed #bbb;padding: 2px;" href="logout.php">Logout</a>

<form id="register" method="post" action="index.php">
<h1>Register for indiaping admin users</h1>
  <fieldset> 
    <legend>user details</legend> 
    <div> 
        <label>user name/id
        <input id="given-name" name="uname" type="text"> 
		</label>
    </div>
    <div> 
        <label>password
        <input id="family-name" name="pswd" type="text"> 
		</label>
    </div>
   
  </fieldset>
  
  <fieldset> 
  	<div> 
	    <input type="submit" name="submit" value="submit" > 
    </div> 
  </fieldset> 
</form>

   
  <fieldset>
     <legend>existing account</legend> 
	 <table>
	 <tr>
		<td>user_id</td>
		<td>password</td>		
		<td>delete</td>
	 </tr>
	 <?php
	 		$query = "SELECT * FROM user_info1";
			$result = mysql_query($query);
			if ($result)
			while($row=mysql_fetch_array($result))
			if(isset($row))  {
				$p = md5($row['user_id']);
				$str =  "<tr><td>{$row['user_id']}</td><td>{$row['user_pwd']}</td><td><a href=\"duser.php?uid={$p}\">delete<a/></td></tr>";
				echo $str;
			}
	 ?> 
	 </table>
	 
	 
	 
  </fieldset>

</body>
</html>