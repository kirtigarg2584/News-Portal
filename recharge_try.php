<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

$customer_name = $_REQUEST['customer_name'];
$profile = $_REQUEST['profile'];
$date_of_birth = $_REQUEST['date_of_birth'];
$charges = $_REQUEST['charges'];
$renewal = $_REQUEST['renewal'];
$sno= $_REQUEST['sno'];

$tracking=$_REQUEST['recharge'];
 $date = "2014-04-03";
$newdate = strtotime ( '+1 month' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );
 
echo $newdate;
if($tracking=='1 Month')
{



$query = "select * from registered_user where create_date > CURDATE()  order by create_date desc";
$result =  mysql_query($query) or die('could not select todays data');
$query_count = "select count(*) from registered_user where create_date > CURDATE()  order by create_date desc";
$result_count =  mysql_query($query_count) or die('could not select todays data');
$counter = mysql_fetch_array($result_count);
}

elseif($tracking=='6 Months')
{

$query = "select * from registered_user where create_date < CURDATE() and create_date > DATE_ADD(CURDATE(), INTERVAL -1 DAY)  order by create_date desc";
$result =  mysql_query($query) or die('could not select yesterday data');
$query_count = "select count(*) from registered_user where create_date < CURDATE() and create_date > DATE_ADD(CURDATE(), INTERVAL -1 DAY)  order by create_date desc";
$result_count =  mysql_query($query_count) or die('could not select todays data');
$counter = mysql_fetch_array($result_count);
}

elseif($tracking=='12 Months')
{
$query = "select * from registered_user where create_date < CURDATE() and create_date > DATE_ADD(CURDATE(), INTERVAL -7 DAY)  order by create_date desc ";
$result =  mysql_query($query) or die('could not select Last 7 Days data');
$query_count = "select count(*) from registered_user where create_date < CURDATE() and create_date > DATE_ADD(CURDATE(), INTERVAL -7 DAY)  order by create_date desc ";

$result_count =  mysql_query($query_count) or die('could not select todays data');
$counter = mysql_fetch_array($result_count);
}


else
{

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Metal Admin Panel</title>
		<link rel="shortcut icon" href="image/favicon.ico">
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
		<link id="color" rel="stylesheet" type="text/css" href="css/blue.css">
		<!-- scripts (jquery) -->
		<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
		<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="js/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="js/jquery.flot.min.js" type="text/javascript"></script>
		<script src="js/tiny_mce.js" type="text/javascript"></script>
		<script src="js/jquery.tinymce.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
		<script src="js/smooth.js" type="text/javascript"></script>
		<script src="js/smooth.menu.js" type="text/javascript"></script>
		<script src="js/smooth.chart.js" type="text/javascript"></script>
		<script src="js/smooth.table.js" type="text/javascript"></script>
		<script src="js/smooth.form.js" type="text/javascript"></script>
		<script src="js/smooth.dialog.js" type="text/javascript"></script>
		<script src="js/smooth.autocomplete.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				style_path = "resources/css/colors";

				$("#date-picker").datepicker();

				$("#box-tabs, #box-left-tabs").tabs();
			});
		</script>
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
	<link rel="stylesheet" href="css/ui.css"></head>
	<body>
		
<div id="header">
			<!-- logo -->
			<div id="logo">
				<h1><a href="index.php" title="Metal Admin Panel"><img src="image/logo.png" alt="Metal Admin Panel"></a></h1>
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
						<a href="" title="Events"><span class="icon"><img src="image/calendar.png" alt="Events"></span><span>Profile</span></a>
						<ul style="visibility: hidden;">
							<li><a href="add_profile.php">Add Profile</a></li>
							<li class="last"><a href="view_profile.php">View Profile</a></li>
						</ul>
					</li>
					<li>
						<a href="" title="Pages"><span class="icon"><img src="image/page_white_copy.png" alt="Pages"></span><span>Metal</span></a>
						<ul style="visibility: hidden;">
							<li><a href="add_metal.php">Add Metal</a></li>
							<li><a href="view_metal.php">View Metal</a></li>
							<!--<li class="last">
								<a href="#" class="childs">Help</a>
								<ul style="display: none;">
									<li><a href="#">How to Add a New Page</a></li>
									<li class="last"><a href="#">How to Add a New Page</a></li>
								</ul>
							</li>-->
						</ul>
					</li>
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
							<a href="#" class="collapsible plus">Profile</a>
							<ul class="collapsed">
								<li><a href="add_profile.php">Add Profile</a></li>
								<li class="last"><a href="view_profile.php">View Profile</a></li>
							</ul>
						</li>
                        <li class="collapsible last">
							<a href="#" class="collapsible plus">Metal</a>
							<ul class="collapsed">
								<li><a href="add_metal.php">Add Metal</a></li>
								<li class="last"><a href="view_metal.php">View Metal</a></li>
							</ul>
						</li>
                        <?php if($_SESSION['username']==='admin'){
						echo "<li class=\"collapsible last\">"."<a href=\"#\" class=\"collapsible plus\">News</a><ul class=\"collapsed\"><li><a href=\"add_news.php\">Add News</a></li><li class=\"last\"><a href=\"view_news.php\">View News</a></li></ul></li>";
						}
						?>
					</ul>
					<h6 id="h-menu-pages"><a href="#"><span>&nbsp;</span></a></h6>
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
					</ul>
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
						 <form method="post">
<table>
	<tr>
		<td><b>Customer Name:</b></td>
		<td><input type="text" name="customer_name" value="<?php echo $customer_name ?>" readonly="true" /></td>
	</tr>
	<tr>
		<td><b>Profile</b></td>
		<td><input type="text" name="profile" value="<?php echo $profile?>" readonly="true" /></td>
	</tr>
    <tr>
		<td><b>Date of Birth</b></td>
		<td><input type="text" name="date_of_birth" value="<?php echo $date_of_birth?>" readonly="true" /></td>
	</tr>
    <tr>
		<td><b>Charges</b></td>
		<td><input type="text" name="charges" value="<?php echo $charges ?>" readonly="true" /></td>
	</tr>
    
    <tr>
		<td><b>Renewal After</b></td>
		<td><input type="text" name="renewal" value="<?php echo $renewal ?>" readonly="true" / ></td>
	</tr>
    <tr>
	<td><b>Recharge</b></td>
<td><select>
<option>Select Recharge</option>
<option>1 Month</option>
<option>6 Months</option>
<option>12 Months</option>
</select></td><br /><br />
    </tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="recharge" value="Recharge" /></td>
	</tr>
</table>
</form>
					</div>
				</div>
				<!-- end table -->
				
				</body></html>