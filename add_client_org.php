<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

function confirmcode_generator(){
   
   $confirmcode = '';
   $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
   $random_string_length=6;
   for ($i = 0; $i < $random_string_length; $i++) {
      $confirmcode .= $characters[rand(0, strlen($characters) - 1)];
                                                  }
   return $confirmcode;
                               }

if(isset($_REQUEST['customer_name']))
{
 
$customer_name=$_REQUEST['customer_name'];
$login_id=$_REQUEST['login_id'];
$password=$_REQUEST['password'];
$dob=$_REQUEST['dob'];
$charges=$_REQUEST['charges'];
$profile=$_REQUEST['profile'];
$uid=$_REQUEST['confirmcode'];
//$date=$_REQUEST['date'];
$confirmcode = confirmcode_generator();
$currentdate=date('Y-m-d H:i:s');

//echo "$aname";
$query="insert into add_client(customer_name,login_id,password,date_of_birth,charges,profile,uid,active_date,expiry_date) values('$customer_name','$login_id','$password','$dob','$charges','$profile','$confirmcode','$currentdate',DATE_ADD( '$currentdate', INTERVAL 1 month ))";
$result=mysql_query($query) or die(mysql_error());
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
        
        <link rel="stylesheet" type="text/css" href="css/screen.css">     <!-- add profile css-->
	<link rel="stylesheet" type="text/css" href="css/dropdown.css">       <!-- add profile css-->

	
		<!-- scripts (jquery) -->
		<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
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
						
						
							
	<form action="#" method="post">
		
		
		<fieldset class="contact">
			<legend>Client Details</legend>
			<div>
				<label for="customer_name">Customer Name</label> <input type="text" id="customer_name" name="customer_name">
			</div>
			<div>
				<label for="login_id">Login ID</label> <input type="text" id="login_id" name="login_id">
			</div>
            <div>
				<label for="password">Password</label> <input type="text" id="password" name="password">
			</div>
			<!--<div class="radio">
				<fieldset>
					<legend><span>Gender</span></legend>
					<div>
						<input type="radio" id="male" name="gender" value="male"> <label for="male">Male</label>
					</div>
					<div>
						<input type="radio" id="female" name="gender" value="female"> <label for="female">Female</label>
					</div>
				</fieldset>
			</div>-->
			<div class="date">
				<fieldset>
					<legend><span>Date of Birth</span></legend>
					<div>
						<label for="day">Day</label>
						<select id="day" name="dob_day">
							<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
						</select>
					</div>
					<div>
						<label for="month">Month</label>
						<select id="month" name="dob_month">
							<option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>
						</select>
					</div>
					<div>
						<label for="year">Year</label>
						<select id="year" name="bod_year">
							<option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option>
						</select>
					</div>
				</fieldset>
			</div>
            <div>
				<label for="charges">Charges</label> <input type="text" id="charges" name="charges">
			</div>
            <div>
				<label for="profile">Profile</label> <select name="profile">
               <option value="" disabled="disabled" selected="selected" name="profile">&nbsp;Select Profile&nbsp;</option>
               
                                     <?
               include("opendb.php");
                $select="profile";
                if (isset ($select)&&$select!=""){
                $select=$_POST ['NEW'];
            }
            ?>
            <?
                $list=mysql_query("select profile_name from profile order by profile_name desc");
            while($row_list=mysql_fetch_assoc($list)){
                ?>
                    <option value="<? echo $row_list['profile_name']; ?>"<? if($row_list['profile_name']==$select){ echo "selected"; } ?>>
                                         <?echo $row_list['profile_name'];?>
                    </option>
                <?
                }
                ?>        
               </select>
			</div>
            <!--<div>
				<label for="uid">Uid</label> <input type="text" id="uid" name="uid" value="<?php echo $confirmcode ?>" readonly>
			</div>
            <div>
				<label for="date">Expiry Date</label> <input type="text" id="date" name="date">
			</div>

			<div>
				<label for="email">Email</label> <input type="text" id="email" name="email" class="email">
			</div>-->
		
		<div><button type="submit" id="submit-go">Submit</button></div>
	</form>
					</div>
				
				<!-- end table -->
				
				</body></html>