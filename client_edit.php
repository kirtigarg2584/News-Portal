<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

$customer_name = $_REQUEST['customer_name'];
if(isset($_REQUEST['profilename'])){
$profilename = $_REQUEST['profilename'];
}
if(isset($_REQUEST['date_of_birth'])){
$date_of_birth = $_REQUEST['date_of_birth'];
}
$charges = $_REQUEST['charges'];
$expiry_date = $_REQUEST['expiry_date'];
 $current_sno= $_REQUEST['sno'];
$login_id = $_REQUEST['login_id'];
$password = $_REQUEST['password'];
$uid =$_REQUEST['uid'];
if(isset($_REQUEST['lit'])){
 $new_profile=$_REQUEST['lit'];
//($aa);
 $new_profile_name=implode(':',$new_profile);}
if(isset($_POST['save']))

{




 $client_query = "update customer SET customer_name='$customer_name' ,login_id = '$login_id',password='$password',charges='$charges', profilename='$new_profile_name',uid ='$uid',expiry_date = '$expiry_date' where  sno='$current_sno'";
$result_client_query = mysql_query($client_query) or die(mysql_error());
header("Location: view_client.php");
}
//$row_client = array();


//$row_client[] = $list;

//
//$arrlength = count($row_query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Admin Panel</title>
		<link rel="shortcut icon" href="image/favicon.ico">
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
		<link id="color" rel="stylesheet" type="text/css" href="css/blue.css">
		
		     
		<link rel="stylesheet" type="text/css" media="all" href="cs/calendar.css">
<script type="text/javascript" src="cs/calendar.js"></script>
<script type="text/javascript" src="cs/calendar-en.js"></script>
<script type="text/javascript" src="cs/calendar-setup.js"></script>


		<!-- scripts (jquery) -->
		<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
		<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="js/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="js/jquery.flot.min.js" type="text/javascript"></script>
		<script src="js/tiny_mce.js" type="text/javascript"></script>
		<script src="js/jquery.tinymce.js" type="text/javascript"></script>
		
		 <script type="text/javascript" src="js/helpers.js"></script> <!-- add profile js-->
		<!-- scripts (custom) -->
		<script src="js/smooth.js" type="text/javascript"></script>
		<script src="js/smooth.menu.js" type="text/javascript"></script>
		<!--script src="js/smooth.chart.js" type="text/javascript"></script>
		<script src="js/smooth.table.js" type="text/javascript"></script>
		<!--script src="js/smooth.form.js" type="text/javascript"></script-->
		<!--script src="js/smooth.dialog.js" type="text/javascript"></script>
		<script src="js/smooth.autocomplete.js" type="text/javascript"></script-->
		
        <script language="javascript">
function validate()
{
var chks = document.getElementsByName('checkbox[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (hasChecked == false)
{
alert("Please select at least one.");
return false;
}
return true;
}
</script>
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
var x=document.forms["myForm"]["customer_name"].value;
if (x==null || x=="")
{
alert("Customer Name field is blank");
return false;
} 
var y=document.forms["myForm"]["login_id"].value;
if (y==null || y=="")
{
alert("Login id field is blank");
return false;
} 
var a=document.forms["myForm"]["password"].value;
if (a==null || a=="")
{
alert("Password field is blank");
return false;
}

var b=document.forms["myForm"]["charges"].value;
if (b==null || b=="")
{
alert("Charges field is blank");
return false;
}
var selectitems = document.forms["myForm"]["lit[]"];
var items = selectitems.getElementsByTagName("option");
if (items.length == 0)
{
alert("Profile field is blank");
return false;
}
var k=document.forms["myForm"]["uid"].value;
if (k=="YY/MM/DD")
{
alert("Uid field is blank");
return false;
}

var e=document.forms["myForm"]["expiry_date"].value;
if (e=="YY/MM/DD")
{
alert("Expiry date field is blank");
return false;
}

} 
</script>
	</head>
	<body>
		
<div id="header">
			<!-- logo -->
			<div id="logo">
				<h1><a href="index.php" title="BlackWallet Admin Panel"><img src="image/logo.png" alt="BlackWallet Admin Panel"></a></h1>
			</div>
			<!-- end logo -->
			<!-- user -->
			<ul id="user">
				<!--<li class="first"><a href="">Account</a></li>
				<li><a href="">Messages (0)</a></li>-->
				<li><a href="logout.php">Logout</a></li>
				<!--<li class="highlight last"><a href="">View Site</a></li>-->
			</ul>
			<!-- end user -->
			<div id="header-inner">
				<div id="home">
					<a href="index.php" title="Home"></a>
				</div>
				<!-- quick -->
				<ul id="quick">
					<li>
						<a href="#" title="Products"><span class="normal">Client</span></a>
						<ul style="visibility: hidden;">
							<li><a href="add_client.php">Add Client</a></li>
							<li><a href="view_client.php">View Client</a></li>
							
						</ul>
					</li>
					<li>
						<a href="#" title="Products"><span class="icon"><img src="image/application_double.png" alt="Products"></span><span>Result</span></a>
						<ul style="visibility: hidden;">
							<li><a href="add_result.php">Add Result</a></li>
							<li><a href="view_result.php">View Result</a></li>
							<!--<li>
								<a href="#" class="childs">Sales</a>
								<ul style="display: none;">
									<li><a href="">Today</a></li>
									<li><a href="">Yesterday</a></li>
									<li class="last">
										<a href="#" class="childs">Archive</a>
										<ul style="display: none;">
											<li><a href="">Last Week</a></li>
											<li class="last"><a href="">Last Month</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="last">
								<a href="#" class="childs">Offers</a>
								<ul style="display: none;">
									<li><a href="">Coupon Codes</a></li>
									<li class="last"><a href="">Rebates</a></li>
								</ul>
							</li>-->
						</ul>
					</li>
					<li>
						<a href="" title="Events"><span class="icon"><img src="image/calendar.png" alt="Events"></span><span>Group</span></a>
						<ul style="visibility: hidden;">
							<li><a href="add_group.php">Add Group</a></li>
							<li class="last"><a href="view_group.php">View group</a></li>
						</ul>
					</li>
					<!--li>
						<a href="" title="Pages"><span class="icon"><img src="image/page_white_copy.png" alt="Pages"></span><span>Metal</span></a>
						<ul style="visibility: hidden;">
							<li><a href="add_metal.php">Add Metal</a></li>
							<li><a href="view_metal.php">View Metal</a></li>
							<li class="last">
								<a href="#" class="childs">Help</a>
								<ul style="display: none;">
									<li><a href="#">How to Add a New Page</a></li>
									<li class="last"><a href="#">How to Add a New Page</a></li>
								</ul>
							</li>
						</ul>
					</li-->
					<?php if($_SESSION['username']==='admin'){
					echo "<li>"."<a href=\"\" title=\"Links\"><span class=\"icon\"><img src=\"image/world_link.png\" alt=\"Links\"></span><span>News</span></a><ul style=\"visibility: hidden;\"><li><a href=\"add_news.php\">Add News</a></li><li class=\"last\"><a href=\"view_news.php\">View News</a></li></ul></li>";
					}
					?>
					<!--<li>
						<a href="" title="Settings"><span class="icon"><img src="image/cog.png" alt="Settings"></span><span>Settings</span></a>
						<ul style="visibility: hidden;">
							<li><a href="#">Manage Settings</a></li>
							<li class="last"><a href="#">New Setting</a></li>
						</ul>
					</li>-->
				</ul>
				<!-- end quick -->
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
		</div>
		<!-- end header -->
		<!-- content -->
		<div id="content">
			<!-- end content / left -->
			<div id="left">
				<div id="menu">
					<h6 id="h-menu-products" class="selected"><a href="#"><span></span>&nbsp;</a></h6>
					<ul id="menu-products" class="opened">
						<!--<li><a href="">Manage Products</a></li>
						<li class="selected"><a href="">Add Product</a></li>-->
						<li class="collapsible">
							<a href="#" class="collapsible plus">Client</a>
							<ul id="whatever" class="collapsed">
								<li><a href="add_client.php">Add Client</a></li>
								<li><a href="view_client.php">View Client</a></li>
								<!--<li class="collapsible last">
									<a href="#" class="collapsible plus">Archive</a>
									<ul class="collapsed">
										<li><a href="">Last Week</a></li>
										<li><a href="">Last Month</a></li>
									</ul>
								</li>-->
							</ul>
						</li>
						<li class="collapsible last">
							<a href="#" class="collapsible plus">Result</a>
							<ul class="collapsed">
								<li><a href="add_result.php">Add Result</a></li>
								<li class="last"><a href="view_result.php">View Result</a></li>
							</ul>
						</li>
                        <li class="collapsible last">
							<a href="#" class="collapsible plus">Group</a>
							<ul class="collapsed">
								<li><a href="add_group.php">Add Group</a></li>
								<li class="last"><a href="view_group.php">View Group</a></li>
							</ul>
						</li>
                        <!--li class="collapsible last">
							<a href="#" class="collapsible plus">Metal</a>
							<ul class="collapsed">
								<li><a href="add_metal.php">Add Metal</a></li>
								<li class="last"><a href="view_metal.php">View Metal</a></li>
							</ul>
						</li-->
                        <?php if($_SESSION['username']==='admin'){
						echo "<li class=\"collapsible last\">"."<a href=\"#\" class=\"collapsible plus\">News</a><ul class=\"collapsed\"><li><a href=\"add_news.php\">Add News</a></li><li class=\"last\"><a href=\"view_news.php\">View News</a></li></ul></li>";
						}
						?>
					</ul>
					<!--h6 id="h-menu-pages"><a href="#"><span>&nbsp;</span></a></h6>
					<ul id="menu-pages" class="closed">
						<li><a href="">Manage Pages</a></li>
						<li><a href="">New Page</a></li>
						<li class="collapsible last">
							<a href="#" class="plus">Help</a>
							<ul class="collapsed">
								<li><a href="">How to Add a New Page</a></li>
								<li class="last"><a href="">How to Add a New Page</a></li>
							</ul>
						</li>
					</ul>
					<h6 id="h-menu-events"><a href="#"><span>&nbsp;</span></a></h6>
					<ul id="menu-events" class="closed">
						<li><a href="">Manage Events</a></li>
						<li class="last"><a href="">New Event</a></li>
					</ul>
					<h6 id="h-menu-links"><a href="#"><span>&nbsp;</span></a></h6>
					<ul id="menu-links" class="closed">
						<li><a href="">Manage Links</a></li>
						<li class="last"><a href="">Add Link</a></li>
					</ul>
					<h6 id="h-menu-settings"><a href="#"><span>&nbsp;</span></a></h6>
					<ul id="menu-settings" class="closed">
						<li><a href="">Manage Settings</a></li>
						<li class="last"><a href="">New Setting</a></li>
					</ul-->
				</div>
				</div>
			<!-- end content / left -->
			<!-- content / right -->
			<div id="right">
				<!-- table -->
				<div class="box">
					<!-- box / title -->
					<div class="title">
						<h5>&nbsp;</h5>
						
							
						
					</div>
					<!-- end box / title -->
					<div class="table">
						 <form action="client_edit.php" id="myForm" method="post" onsubmit="return validate()">
						 <input type="hidden" value="<?php echo $current_sno; ?>" name="sno" id="sno"> 
<table>
	<tr>
		<td>Customer Name:</td>
		<td><input type="text" name="customer_name" value="<?php echo $customer_name ?>"/></td>
	</tr>
	<tr>
		<td>Login id:</td>
		<td><input type="text" name="login_id" value="<?php echo $login_id ?>"/></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="text" name="password" value="<?php echo $password ?>"/></td>
	</tr>
	<tr>
		<td>Charges</td>
		<td><input type="text" name="charges" value="<?php echo $charges?>"/></td>
	</tr>
    <tr>
		<td>Profile</td>
		
                   
		<td>           <!--select  name='groupname' id="groupname">
		<?php 
		$userT = $_SESSION['username'];
		//$list=mysql_query("select DISTINCT groupname from customer WHERE groupname !='' and AddBy='$userT'  order by groupname asc");
           // while($row_list=mysql_fetch_assoc($list)){
                ?> <option value="<?php// echo $row_list['groupname']; ?>"<?php //if($row_list['groupname']==$groupname){ echo "selected"; } ?>>
                                         <?php //echo $row_list['groupname'];?>
                    </option>
                <?php
             //   }
                ?>
				</select-->
				
				<table style='width:370px;'>

    <tr><div align="center"><b>Assign to Profile</b></div>
        <td style='width:160px;'>
            <b>Select from Group</b><br/>
           <select multiple="multiple" id='lstBox1'>
                 <?php
                
                $select="result";
                if (isset ($select)&&$select!=""){
                $select=$_POST ['NEW'];
            }
            ?>
            <?php
			$userTE = $_SESSION['username'];
                $list=mysql_query("select DISTINCT group_name from grouptable where AddBy='$userTE' order by group_name asc");
            while($row_list=mysql_fetch_assoc($list)){
                ?>
                    <option value="<?php echo $row_list['group_name']; ?>"<?php if($row_list['group_name']==$select){ echo "selected"; } ?>>
                                         <?php echo $row_list['group_name'];?>
                    </option>
                <?php
                }
                ?> 
    
        </select>
    </td>
    <td style='width:50px;text-align:center;vertical-align:middle;'>
        <input type='button' id='btnRight' value ='  >  '/>
        <br/><input type='button' id='btnLeft' value ='  <  '/>
    </td>
    <td style='width:160px;'>
        <b>New Profile</b><br/>
        <select multiple="multiple" id='lstBox2' name="lit[]">
    	<?php
		
                $list1=mysql_query("select profilename from customer WHERE customer_name = '$customer_name'   and charges='$charges' and expiry_date = '$expiry_date' and sno = '$current_sno'");
            $group = array();
			while($row_list1=mysql_fetch_array($list1)){
			foreach ($row_list1 as $grouparray)
      {

$group = explode("_",$grouparray);
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
				
				 </td>
	</tr>
    <tr>
		<td>Uid</td>
		<td><input type="text" name="uid" id="uid" value="<?php echo $uid ?>"/></td>
	</tr>
    
    <tr>
		<td>Expiry Date</td>
		<td><input name="expiry_date" id="expiry_date" class="form_input_text" size="15" value="<?php if(isset($expiry_date)){ echo $expiry_date; }else{?>YY/MM/DD<?php }?>" type="text" style="cursor:pointer">
	    	 	<script type="text/javascript">
		    	 Calendar.setup
		     	 ({
			    inputField              : "expiry_date",// ID of the input field
			    ifFormat                : "%Y-%m-%d 23:59:59",// the date format
			    button                  : "expiry_date",// ID of the button   
			    singleClick             : true
		      	 });
		       </script></td>
	</tr>
	
    <input type="hidden" name="current_sno" id="current_sno" value="<?php echo $current_sno ?>"> 
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
</table>
</form>
					</div>
				</div>
				<!-- end table -->
				<?php

// Check if delete button active, start this 
if(isset($_REQUEST['delete'])) {
$checkbox = $_REQUEST['checkbox'];
echo$count=count($_REQUEST['checkbox']);
for($i=0;$i<$count;$i++){
$del_sno = $checkbox[$i];
$sql = "DELETE FROM add_client WHERE sno='$del_sno'";
$result = mysql_query($sql);
}
// if successful redirect to delete_multiple.php 
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=view_client.php\">";
}
}
mysql_close();
?>
				</body></html>