<?php
ob_start();
session_start();
if(!isset($_SESSION['username'])){header("Location: login.php");}include('opendb.php');error_reporting(E_ALL);
ob_end_flush();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Admin Panel</title>
		<link rel="shortcut icon" href="image/favicon.ico">
		<!-- stylesheets -->

                <link rel="stylesheet" type="text/css" href="dashboard/grid.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="dashboard/styles.css" media="screen" />

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
				<h1><a href="index.php" title="Admin Panel"><img src="image/logo.png" alt="Admin Panel"></a></h1>
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
							<li class="last"><a href="view_group.php">View Group</a></li>
						</ul>
					</li>
					<!--li>
						<a href="" title="Pages"><span class="icon"><img src="image/page_white_copy.png" alt="Pages"></span><span>Metal</span></a>
						<ul style="visibility: hidden;">
							<li><a href="add_metal.php">Add Metal</a></li>
							<li><a href="view_metal.php">View Metal</a></li>
						
						</ul>
					</li-->
					<?php if($_SESSION['username']=='admin'){

echo "<li>"."<a href=\"\" title=\"Links\"><span class=\"icon\"><img src=\"image/world_link.png\" alt=\"Links\"></span><span>News</span></a><ul style=\"visibility: hidden;\"><li><a href=\"add_news.php\">Add News</a></li></ul></li>";
					}
					?>
					<li>
						<a href="" title="Links"><span class="icon"><img src="image/password_img.png" alt="Links"></span><span>Change Password</span></a>
						<ul style="visibility: hidden;">
							<li><a href="change_password.php">Change Password</a></li>
							
                            
							
						</ul>
					</li>
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
                        <?php if($_SESSION['username']=='admin'){
						echo "<li class=\"collapsible last\">"."<a href=\"#\" class=\"collapsible plus\">News</a>"."<ul class=\"collapsed\">"."<li><a href=\"add_news.php\">Add News</a></li>"."<li class=\"last\"><a href=\"view_news.php\">View News</a></li>"."</ul>"."</li>";
						}
						?>
                       <li class="collapsible last">
							<a href="#" class="collapsible plus">Change Password</a>
							<ul class="collapsed">
								<li><a href="change_password.php">Change Password</a></li>
								
							</ul>
						</li>
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
						<form action="" method="post">
						<table>

            <div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="index.php" class="dashboard-module">
                	<img src="image/Crystal_Clear_write.gif" width="64" height="64" alt="edit" />
                	<span>Home</span>
                </a>
                
                <a href="add_client.php" class="dashboard-module">
                	<img src="image/Crystal_Clear_user.gif" width="64" height="64" alt="edit" />
                	<span>Client</span>
                </a>
                
                <a href="add_result.php" class="dashboard-module">
                	<img src="image/Crystal_Clear_files.gif" width="64" height="64" alt="edit" />
                	<span>Result</span>
                </a>
                
                <a href="add_group.php" class="dashboard-module">
                	<img src="image/Crystal_Clear_calendar.gif" width="64" height="64" alt="edit" />
                	<span>Group</span>
                </a>
                
                <!--a href="add_metal.php" class="dashboard-module">
                	<img src="image/Crystal_Clear_file.gif" width="64" height="64" alt="edit" />
                	<span>Metal</span>
                </a-->
                <?php if($_SESSION['username']=='admin'){
		echo "<a href=\"add_news.php\" class=\"dashboard-module\"><img src=\"image/Crystal_Clear_stats.gif\" width=\"64\" height=\"64\" alt=\"edit\" /><span>News</span></a>";
		}?>
                
                <a href="logout.php" class="dashboard-module">
                	<img src="image/Crystal_Clear_settings.gif" width="64" height="64" alt="edit" />
                	<span>Logout</span>
                </a>
                <div style="clear: both"></div>
            </div> 
							<!--<thead>
								<tr>
									<th class="left">Title</th>
									<th>Price</th>
									<th>Added</th>
									<th>Category</th>
									<th class="selected last"><input type="checkbox" class="checkall"></th>
								</tr>
							</thead>--></br></br></br></br></br></br>
							<!--<tbody>
								<tr>
									<td class="title">24" LED Monitor</td>
									<td class="price">$110.00</td>
									<td class="date" id="dp1390459629713">April 25th, 2010 at 4:15 PM</td>
									<td class="category">Monitors</td>
									<td class="selected last"><input type="checkbox"></td>
								</tr>
								<tr>
									<td class="title">27" LCD Flat Panel</td>
									<td class="price">$150.00</td>
									<td class="date" id="dp1390459629714">April 25th, 2010 at 4:15 PM</td>
									<td class="category">Monitors</td>
									<td class="selected last"><input type="checkbox"></td>
								</tr>
								<tr>
									<td class="title">6GB 240-Pin DDR3 SDRAM DDR3 1600</td>
									<td class="price">$80.00</td>
									<td class="date" id="dp1390459629715">April 25th, 2010 at 4:15 PM</td>
									<td class="category">Memory</td>
									<td class="selected last"><input type="checkbox"></td>
								</tr>
								<tr>
									<td class="title">500GB 7200 RPM 16MB Cache SATA 3.0Gb/s 3.5</td>
									<td class="price">$92.00</td>
									<td class="date" id="dp1390459629716">April 25th, 2010 at 4:15 PM</td>
									<td class="category">Hard Drives</td>
									<td class="selected last"><input type="checkbox"></td>
								</tr>
								<tr>
									<td class="title">2GB 240-Pin DDR3 SDRAM DDR3 1600</td>
									<td class="price">$52.00</td>
									<td class="date" id="dp1390459629717">April 25th, 2010 at 4:15 PM</td>
									<td class="category">Memory</td>
									<td class="selected last"><input type="checkbox"></td>
								</tr>
							</tbody>-->
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
						<!--<div class="action">
							<select name="action" aria-disabled="false" style="display: none;">
								<option value="" class="locked">Set status to Deleted</option>
								<option value="" class="unlocked">Set status to Published</option>
								<option value="" class="folder-open">Move to Category</option>
							</select><div><a class="ui-selectmenu ui-widget ui-state-default ui-corner-all ui-selectmenu-dropdown locked ui-selectmenu-hasIcon" id="ui-selectmenu-3f9f687b-button" role="button" href="index.html?username=admin&password=password#nogo" tabindex="0" aria-haspopup="true" aria-owns="ui-selectmenu-3f9f687b-menu" aria-disabled="false" style="width: 200px;"><span class="ui-selectmenu-status"><span class="ui-selectmenu-item-icon ui-icon ui-icon-locked"></span>Set status to Deleted</span><span class="ui-selectmenu-icon ui-icon ui-icon-triangle-1-s"></span></a></div>
							<div class="button">
								<input type="submit" name="submit" value="Apply to Selected" class="ui-button ui-widget ui-state-default ui-corner-all" role="button" aria-disabled="false">
							</div>
						</div>-->
						<!-- end table action -->
						</form>
					</div>
				</div>
				<!-- end table -->
				
</body></html>