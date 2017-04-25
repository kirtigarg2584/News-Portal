<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
$userTemp = $_SESSION['username'];
include("opendb.php");
$currentdate=date('Y-m-d H:i:s');
if($_POST['submitForSearchClient']){
$userToSearch = $_POST['searchForClient'];
$resultForSearchClientquery = "select customer_name,profilename,charges,expiry_date,DATEDIFF(expiry_date,'$currentdate'),sno as sno_now,status,login_id,password,uid,date_of_birth,imei,last_seen from customer where AddBy ='$userTemp'";
$resultForSearchClient =  mysql_query($resultForSearchClientquery) or die('cud not select');
}
$num_rec_per_page=10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM customer LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); 

$query = "select customer_name,profilename,charges,expiry_date,DATEDIFF(expiry_date,'$currentdate'),sno as sno_now,status,login_id,password,uid,date_of_birth,imei,last_seen,online from customer where AddBy ='$userTemp'";
$result =  mysql_query($query) or die('cud not select');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Admin Panel</title>
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
					<?php if($_SESSION['username']==='admin'){
					echo "<li>"."<a href=\"\" title=\"Links\"><span class=\"icon\"><img src=\"image/world_link.png\" alt=\"Links\"></span><span>News</span></a><ul style=\"visibility: hidden;\"><li><a href=\"add_news.php\">Add News</a></li><li class=\"last\"><a href=\"view_news.php\">View News</a></li></ul></li>";
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
                        <?php if($_SESSION['username']==='admin'){
						echo "<li class=\"collapsible last\">"."<a href=\"#\" class=\"collapsible plus\">News</a><ul class=\"collapsed\"><li><a href=\"add_news.php\">Add News</a></li><li class=\"last\"><a href=\"view_news.php\">View News</a></li></ul></li>";
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
					<form action="view_client.php" method="post" style="margin: 2px 23px;">
						<div>
							<label for="searchForClient">Search for client</label>
							<input type="text" name="searchForClient" id="searchForClient">
							<input style="display: inline;"type="submit" name="submitForSearchClient" value="submit">
						</div>
						<?php
						if($_POST['submitForSearchClient']){
						//$query = "select customer_name,profilename,charges,expiry_date,DATEDIFF(expiry_date,'$currentdate'),sno as sno_now,status,login_id,password,uid,date_of_birth,imei,last_seen from customer where AddBy ='$userTemp'";
						//$resultForSearchClient =  mysql_query($query) or die('cud not select');
						
						$SearchClientsno= 0;
						$SearchClientcheck=0;
						
							while( $SearchClientrow = mysql_fetch_array($resultForSearchClient))
							{
							 
								$SearchClientcustomer_name = $SearchClientrow[0]; 
								$SearchClientprofilename = $SearchClientrow[1];

								$SearchClientcharges = $SearchClientrow[2];
								$SearchClientdate = $SearchClientrow[3];

								$SearchClientrenewal=$SearchClientrow[4]."Days";
								$SearchClientsno_current = $SearchClientrow[5];
								$SearchClientstatus = $SearchClientrow[6];
								$SearchClientlogin_id = $SearchClientrow[7];
								$SearchClientpassword= $SearchClientrow[8];
								$SearchClientuid = $SearchClientrow[9];
								$SearchClientdate_of_birth = $SearchClientrow[10];
								$SearchClientimei = $SearchClientrow[11];
								$SearchClientlast_login = $SearchClientrow[12];
								$SearchClientcheck=0;
								$SearchClientsno++;
								
								if(strcasecmp($userToSearch, $SearchClientcustomer_name) == 0){
									echo "<div><p><span style=\"font-weight: bold\">user found!</span>&nbsp;sno. {$SearchClientsno}, {$SearchClientcustomer_name}, from group {$SearchClientprofilename}, last logged in at {$SearchClientlast_login}</p></div>";
								} else if(strcasecmp($userToSearch, $SearchClientcustomer_name)){
									if(isset($userToSearch)) echo "<div><p><span style=\"font-weight: bold\">NO user found! by entered name</span>&nbsp;{$userToSearch}</p></div>";
								}
							}
						}
						?>
					</form>
					<div class="table">
						
						<table width="100%" style=" table-layout:fixed;">
							<thead>
								<tr>
                                                                       <th >Sno</th>
									<th >Customer Name</th>
                                    <th>Group</th>
									<th>IMEI</th>
									<th >Last Login</th>
									<th>Renewal After</th>
									<th>Status</th>
									<th>Action</th>
									<th>Online</th>
									
								</tr>
							</thead>
<?php
        $sno= 0;
        $check=0;
        
       while( $row = mysql_fetch_array($result))
         {
         
         $customer_name = $row[0]; 
         $profilename = $row[1];
     
         $charges = $row[2];
         $date = $row[3];
       
         $renewal=$row[4]."Days";
         $sno_current = $row[5];
         $status = $row[6];
		 $login_id = $row[7];
		 $password= $row[8];
		 $uid = $row[9];
		 $date_of_birth = $row[10];
		 $imei = $row[11];
		 $last_login = $row[12];
		 $online = $row[13];
          $check=0;
		  
          $sno++;
?>
							<tbody>
								<tr>
									<td align="center"  width="2%"><?php echo $sno?></td>
                                
                                <td align="center" width="15%"><?php echo $customer_name?></td>
                                
                                 <td align="center" width="15%" style="overflow:hidden;"><?php echo $profilename?></td>
                                <td align="center" width="10%"><?php echo $imei?></td>
								   <td align="center" width="15%"><?php echo $last_login?></td>
                                <td align="center" width="10%"><?php echo $renewal?></td>
								 <td align="center" width="5%"><a href="status_update_client.php?customer_name=<?php echo $customer_name?>&status=<?php echo $status?>&expiry_date=<?php echo $date?>&charges=<?php echo $charges?>&sno=<?php echo $sno_current?>"><?php if($status == '1'){echo "Activated" ;}else{ echo "Deactivated" ;}?></a></a></td>
                                <td align="center" width="10%" bgcolor="#FFFFFF">
                                 <a href="gcm/send_message.php?uid=<?php echo $uid?>"  id="edit_button" name="edit_button">
									<img src="image/icons/gcm.png" title="send message" width="16" height="16"/>
                                </a>

								 
								 <a href="client_edit.php?customer_name=<?php echo $customer_name?>&profilename=<?php echo $profilename?>&sno=<?php echo $sno_current?>&date_of_birth=<?php echo $date_of_birth?>&charges=<?php echo $charges?>&expiry_date=<?php echo $date?>&login_id=<?php echo $login_id?>&password=<?php echo $password?>&uid=<?php echo $uid?>"  id="edit_button" name="edit_button">
                                <img src="image/icons/user_edit.png" title="Edit Client" width="16" height="16"/>
                                </a>

                               <a href="client_delete.php?customer_name=<?php echo $customer_name?>&profilename=<?php echo $profilename?>&sno=<?php echo $sno_current?>&charges=<?php echo $charges?>" onClick="return confirm('Are you sure to delete this Client?');" id="delete_button" name="delete_button">
                                <img src="image/icons/user_delete.png" title="Delete Client" width="16" height="16"/>
                                </a>


    <a href="client_reset.php?customer_name=<?php echo $customer_name?>&profilename=<?php echo $profilename?>&sno=<?php echo $sno_current?>&charges=<?php echo $charges?>" onClick="return confirm('Are you sure to reset this Client?');" id="reset_button" name="reset_button">
                                <img src="image/icons/refresh.png" title="Reset Client" width="16" height="16"/>
                                </a>
                               
                                
                                
         
                                </td>
								<td>
									<?php if($online){echo "Yes";} else{echo "no";} echo "<a href=\"#\" onclick=\"location.reload(true);\"> refresh</a>"; ?>
								</td>
								</tr>
                               

<?php } ?>
							</tbody>
						</table>
						<?php 
							$sql = "SELECT * FROM customer"; 
							$rs_result = mysql_query($sql); //run the query
							$total_records = mysql_num_rows($rs_result);  //count number of records
							$total_pages = ceil($total_records / $num_rec_per_page); 

							echo "<a href='view_client.php?page=1'>".'|<'."</a> "; // Goto 1st page  

							for ($i=1; $i<=$total_pages; $i++) { 
										echo "<a href='view_client.php?page=".$i."'>".$i."</a> "; 
							}; 
							echo "<a href='view_client.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
						?>
						
					</div>
				</div>
				<!-- end table -->
				
				</body></html>