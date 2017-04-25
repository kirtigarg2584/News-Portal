<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");
if(isset($_REQUEST['result_text'])){
$result_text = $_REQUEST['result_text'];
}
if(isset($_REQUEST['profile_name'])){
$profile_name = $_REQUEST['profile_name'];
}
if(isset($_REQUEST['status'])){
$status_current = $_REQUEST['status'];
}
if(isset($_REQUEST['active_date'])){
$active_date = $_REQUEST['active_date'];
}
if(isset($_REQUEST['current_sno'])){
$current_sno=$_REQUEST['current_sno'];
}
if(isset($_REQUEST['old_unique_id'])){
$old_id = $_REQUEST['old_unique_id'];
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Admin Panel</title>
		<link rel="shortcut icon" href="image/favicon.ico">
		<!-- stylesheets -->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
                </script>
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
		<link id="color" rel="stylesheet" type="text/css" href="css/blue.css">
        
        <link rel="stylesheet" type="text/css" href="css/screen.css">     <!-- add profile css-->
	<link rel="stylesheet" type="text/css" href="css/dropdown.css">       <!-- add profile css-->
                <link rel="stylesheet" href="css/ui.css">
	
		<!-- scripts (jquery) -->
		<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
		
		<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="js/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="js/jquery.flot.min.js" type="text/javascript"></script>
		<script src="js/tiny_mce.js" type="text/javascript"></script>
		<script src="js/jquery.tinymce.js" type="text/javascript"></script>
        
        <script type="text/javascript" src="js/helpers.js"></script> <!-- add profile js-->
	<script type="text/javascript" src="js/date.js"></script>        <!-- add profile js-->
	<script type="text/javascript" src="js/form.js"></script>        <!-- add profile js-->
        
		<!-- scripts (custom) -->
		<script src="js/smooth.js" type="text/javascript"></script>
		<script src="js/smooth.menu.js" type="text/javascript"></script>
		<!--<script src="js/smooth.chart.js" type="text/javascript"></script>
		<script src="js/smooth.table.js" type="text/javascript"></script>
		<script src="js/smooth.form.js" type="text/javascript"></script>
		<script src="js/smooth.dialog.js" type="text/javascript"></script>
		<script src="js/smooth.autocomplete.js" type="text/javascript"></script>-->
		
	<link rel="stylesheet" href="css/ui.css">
	
		
<script type="text/javascript">
$(document).ready(function() {
    $('#btnRight').click(function(e) {
        var selectedOpts = $('#lstBox1 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });

    $('#btnLeft').click(function(e) {
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
});
$(document).ready(function() {
	$('#myForm').submit(function() {
		$('#lstBox2').find('option').each(function() {
			$(this).attr('selected', 'selected');
		});
	});
});
</script>
		<style type="text/css">
body
{
    padding:10px;
    font-family:verdana;
    font-size:8pt;
}

select
{
    font-family:verdana;
    font-size:8pt;
    width : 150px;
    height:100px;
	
}
input
{
    text-align: center;
    v-align: middle;
}
</style>
	<script type="text/javascript">

function validate()
{
var x=document.forms["myForm"]["result_text"].value;
if (x==null || x=="")
{
alert("Add Result field is blank");
return false;
} 

var selectitems = document.forms["myForm"]["lit[]"];
var items = selectitems.getElementsByTagName("option");
if (items.length == 0)
{
alert("Profile field is blank");
return false;
}
} 
</script>
	</head>

	<body>
		

		
			<div id="right" >
				<!-- table -->
				<div class="box">
					<!-- box / title -->
					<div class="title">
						<h5>&nbsp;</h5>
						
							
						
					</div>
					<!-- end box / title -->
					<div class="table">
	<form action="result_edit_save.php" id="myForm" method="post" onsubmit="return validate()">
		<input type="hidden" name="status" id="status" value='<?php echo $status_current?>' />
		<input type="hidden" name="current_sno" id="current_sno" value='<?php echo $current_sno?>' />
		<input type="hidden" name="active_date" id="active_date" value='<?php  $active_date;?>' />
<input type="hidden" name="old_id" id="old_id" value='<?php echo $old_id?>' />
		<fieldset class="contact">
			
         
			<div>
				<label for="news">Add Result</label> 
               <textarea name="result_text" id="result_text" cols="30" rows="4"><?php echo $result_text;?></textarea>
			</div>
            </br></br></br></br></br>
            
            
			<!--<div>
				<label for="email">Email</label> <input type="text" id="email" name="email" class="email">
			</div>-->
			
						<table style='width:370px;'>

    <tr><div align="center"><b>Assign to New Group</b></div>
        <td style='width:160px;'>
            <!--b>Metals:</b--><br/>
           <select multiple="multiple" id='lstBox1'>
                 <?php
              
                $select="result";
                if (isset ($select)&&$select!=""){
                $select=$_POST ['NEW'];
            }
            ?>
            <?php
			$userID = $_SESSION['username'];
                $list=mysql_query("select DISTINCT profilename from customer where AddBy='$userID' UNION select DISTINCT group_name from grouptable where AddBy='$userID'");
            while($row_list=mysql_fetch_assoc($list)){
                ?>
                    <option value="<?php echo $row_list['profilename']; ?>"<?php if($row_list['profilename']==$select){ echo "selected"; } ?>>
                                         <?php echo $row_list['profilename'];?>
                    </option>
                <?php
                }
                ?> 
    
             <!-- <option value="ajax">Ajax</option>
              <option value="jquery">jQuery</option>
              <option value="javascript">JavaScript</option>
              <option value="mootool">MooTools</option>
              <option value="prototype">Prototype</option>
              <option value="dojo">Dojo</option>-->
        </select>
    </td>
    <td style='width:50px;text-align:center;vertical-align:middle;'>
        <input type='button' id='btnRight' value ='  >  '/>
        <br/><input type='button' id='btnLeft' value ='  <  '/>
    </td>
    <td style='width:160px;'>
        <b>New Group: </b><br/>
        <select multiple="multiple" id='lstBox2' name="lit[]" >
		<?php
		
                $list1=mysql_query("select profile_name from result WHERE profile_name='$profile_name' AND sno='$current_sno' AND assigned_id = '$old_id' AND status='$status_current'");
            $group = array();
			while($row_list1=mysql_fetch_array($list1)){
			foreach ($row_list1 as $grouparray)
      {

$group = explode(":",$grouparray);
      }
	  }
	 $arrlength = count($group);
	
	  for($x=0;$x<$arrlength;$x++)
  {
 

 
                ?>
                    <option value="<?php  echo $group[$x]; ?>">
                                         <?php echo $group[$x]; ?>
                    </option>
					
                <?php
                
				 }
				 
                ?> 
				

        </select>
    </td>
</tr>
</table>
			
			
		</fieldset>
		<div><input type="submit" id="submit-go" name="submit-go"></div>
	</form>
					</div>
		
				<!-- end table -->
				
				</body></html>