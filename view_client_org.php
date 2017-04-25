<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

$query = "select customer_name,login_id,password,date_of_birth,charges,profile,uid,date from add_client";
$result =  mysql_query($query) or die('cud not select');
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
					echo "<li>"."<a href=\"\" title=\"Links\"><span class=\"icon\"><img src=\"image/world_link.png\" alt=\"Links\"></span><span>News</span></a><ul style=\"visibility: hidden;\"><li><a href=\"add_news.php\">Add News</a></li></ul></li>";
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
						<form action="" method="post">
						<table>
							<thead>
								<tr>
                                                                       <th >Sno</th>
									<th >Customer Name</th>
                                                                        <th >Date of Birth</th>
									<th>Profile</th>
									<th>Charges</th>
									<th>Action</th>
									
								</tr>
							</thead>
<?php
        $sno= 0;
        $check=0;
        
       while( $row = mysql_fetch_array($result))
         {
         
         $customer_name = $row[0]; 
         $profile = $row[3];
         $date_of_birth = $row[5];
         $charges = $row[4];
         $date = $row[5];
         
         
          $check=0;
          $sno++;
?>
							<tbody>
								<tr>
									<td align="center"  width="5%"><?php echo $sno?></td>
                                
                                <td align="center" width="10%"><?php echo $customer_name?></td>
                                
                                 <td align="center" width="10%"><?php echo $profile?></td>
                                
                                <td align="center" width="10%"><?php echo $date_of_birth?></td>
                                <td align="center" width="10%"><?php echo $charges?></td>
                                
                                <td class="selected last"><input type="checkbox"></td>
								</tr>
                               

<?php } ?>
							</tbody>
						</table>
						<!-- pagination -->
						<!--<div class="pagination pagination-left">
							<div class="results">
								<span>showing results 1-10 of 207</span>
							</div>
							<ul class="pager">
								<li class="disabled">« prev</li>
								<li class="current">1</li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href="">4</a></li>
								<li><a href="">5</a></li>
								<li class="separator">...</li>
								<li><a href="">20</a></li>
								<li><a href="">21</a></li>
								<li><a href="">next »</a></li>
							</ul>
						</div>-->
						<!-- end pagination -->
						<!-- table action -->
						<div class="action">
							<select name="action" aria-disabled="false" style="display: none;">
								<option value="" class="locked">Set status to Deleted</option>
								<option value="" class="unlocked">Set status to Published</option>
								<option value="" class="folder-open">Move to Category</option>
							</select><div><a class="ui-selectmenu ui-widget ui-state-default ui-corner-all ui-selectmenu-dropdown locked ui-selectmenu-hasIcon" id="ui-selectmenu-3f9f687b-button" role="button" href="index.html?username=admin&password=password#nogo" tabindex="0" aria-haspopup="true" aria-owns="ui-selectmenu-3f9f687b-menu" aria-disabled="false" style="width: 200px;"><span class="ui-selectmenu-status"><span class="ui-selectmenu-item-icon ui-icon ui-icon-locked"></span>Set status to Deleted</span><span class="ui-selectmenu-icon ui-icon ui-icon-triangle-1-s"></span></a></div>
							<div class="button">
								<input type="submit" name="submit" value="Apply to Selected" class="ui-button ui-widget ui-state-default ui-corner-all" role="button" aria-disabled="false">
							</div>
						</div>
						<!-- end table action -->
						</form>
					</div>
				</div>
				<!-- end table -->
				
				</body></html>