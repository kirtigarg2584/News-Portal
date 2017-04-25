<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysql_query("SELECT DISTINCT misoptions FROM  mis") 
	or die(mysql_error());

    while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['misoptions'].'">'.$tier['misoptions'].'</option>';
		}

}

//**************************************
//     First selection results     //
//**************************************
if($_GET['func2'] == "drop_1" && isset($_GET['func2'])) { 
   drop_1($_GET['drop_var']); 
}

function drop_1($drop_var)
{   
    include_once('db.php');
    if($drop_var=='FEEDBACK/DISPOSITION'){
    
	$result1 = mysql_query("SELECT DISTINCT Actioncode FROM  action_code ") 
	or die(mysql_error());  //http://stackoverflow.com/questions/11800746/passing-selected-value-of-dropdownlist-in-url
	}
    else if($drop_var=='AGENTWISE REPORT'){
    
    $result2 = mysql_query("SELECT DISTINCT TC FROM call_back ORDER BY TC ASC") 
	or die(mysql_error());  //http://stackoverflow.com/questions/11800746/passing-selected-value-of-dropdownlist-in-url
	}
    
    else if($drop_var=='CAMPAIGNWISE REPORT'){
    
    $result3 = mysql_query("SELECT campaign  FROM campaign ") 
	or die(mysql_error());  //http://stackoverflow.com/questions/11800746/passing-selected-value-of-dropdownlist-in-url
	}
    
    ?>
	<select name="tier_two" id="tier_two">
	      <option value=" " selected="selected">Select from the above Code</option>
<?php

 if($drop_var=='FEEDBACK/DISPOSITION'){

		   while($drop_2 = mysql_fetch_array( $result1)) 
			{
            ?>
			  <option value="<?php echo $drop_2['Actioncode'] ?>"><?php echo $drop_2['Actioncode'] ?></option>
              <?php
			}
            }
            
            else if($drop_var=='AGENTWISE REPORT'){
    

            		   while($drop_2 = mysql_fetch_array( $result2)) 
			{
            ?>
			  <option value="<?php echo $drop_2['TC'] ?>"><?php echo $drop_2['TC'] ?></option>
              <?php
			}
}

   else if($drop_var=='CAMPAIGNWISE REPORT'){
   while($drop_2 = mysql_fetch_array( $result3)) 
			{
            ?>
			  <option value="<?php echo $drop_2['campaign'] ?>"><?php echo $drop_2['campaign'] ?></option>
              <?php
			}
}
    
	?>
    <input name="WINDOW_NAMER" type="HIDDEN" value="1">
    <?php
	echo '</select>';
    
   
  
}
?>