<?php 

$action=$_REQUEST['action'];


//In case of Contact Extraction

if($action == "news")
{ 
  
     include("opendb_metalprice.php");

     $sql_status="select news from news where status='1' ";
     $res_status=mysql_query($sql_status);
     $row_count_status=mysql_num_rows($res_status);
     
     if($row_count_status == 0)
      {
       $output_str = "No_News";
      }

     else
      { $row_fields=mysql_fetch_row($res_status);
        $row_news=$row_fields[0];
       
        $output_str = $row_news; 
           
      }
   print($output_str);
  }
   else
   {
   print("Wrong Action");
   }
   mysql_close();
 
?>