<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

$news = $_REQUEST['news'];
$current_sno = $_REQUEST['current_sno'];
$status_current = $_REQUEST['status'];
$active_date = $_REQUEST['active_date'];
$datevar         = date("Y-m-d h:i:s ");



if($status_current == '1'){
$query_no ="SELECT COUNT( DISTINCT news ) AS Newscount FROM news WHERE status='1'";
$result_no = mysql_query($query_no) or die("Error in query execution");
  $num_row = mysql_num_rows($result_no);
while($row_no =mysql_fetch_array($result_no)){

$news_no = $row_no[0];

}
if($news_no == 1){
header("Location: view_news.php?stat=1");
}
else{
$query_update2 = "UPDATE news SET status = '0' , active_date = '$datevar' WHERE   status = '$status_current' AND news =  '$news' AND active_date = '$active_date' AND sno='$current_sno'";
$result_update2 = mysql_query($query_update2) or die("Error in update2 query");
header("Location: view_news.php");

}

}

if($status_current == '0'){

 $query_update2 = "UPDATE news SET status = '1' , active_date = '$datevar' WHERE status = '$status_current' AND news =  '$news' AND active_date = '$active_date' AND sno='$current_sno'";
$result_update2 = mysql_query($query_update2) or die("Error in update2 query");


 $query_update3 = "UPDATE news SET status = '0' , active_date = '$datevar' WHERE status = '1' AND sno !='$current_sno' ";
$result_update3 = mysql_query($query_update3) or die("Error in update3 query");



header("Location: view_news.php");
}
//header("Location: view_news.php");


?>


