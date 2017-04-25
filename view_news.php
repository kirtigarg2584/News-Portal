<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");
$user3 = $_SESSION['username'];
$query = "select DISTINCT news,active_date,status,sno from news where AddBy='$user3'";
$result =  mysql_query($query) or die('cud not select');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>BlackWallet Admin Panel</title>
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
	
	<link rel="stylesheet" href="css/ui.css">
	<script type="text/javascript"

src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
	<?php 
if(isset($_GET['stat'])){
?>
<script type="text/javascript">

$(document).ready(function() {	

		var id = '#dialog';
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
             
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 	
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});		
	
});

</script>
<?php }?>
<style type="text/css">


a {color:#333; text-decoration:none}
a:hover {color:#969696; text-decoration:none}

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
} 
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}
#boxes #dialog {
  width:375px;
  height:100px;
  padding:10px;
  background-color:#ffffff;
}
</style>
	
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
					<div class="table">
						<form action="" method="post">
						<table width="100%" style=" table-layout:fixed;">
							<thead>
								<tr>
                                                                       <th >SNo</th> 
																	                    <th >News</th>
									<th >Active Date</th>
                                                                        
									<!--th >Active_Date</th-->
									<th >Status</th>
									<th >Action</th>
									
								</tr>
							</thead>
<?php
        $sno= 0;
        $check=0;
        
       while( $row = mysql_fetch_array($result))
         {
         $news = $row[0];
         $active_date = $row[1];
         $status =$row[2];
          
	 $current_sno=$row[3];
       
         
         
         
          $check=0;
          $sno++;
?>
							<tbody>
								<tr>
									<td align="center"  width="5%"><?php echo $sno?></td>
                                     <td align="center" width="5%" style="overflow:hidden;"><?php echo $news?></td>
                                <td align="center" width="1%"><?php echo $active_date?></td>
                           
                                <!--td align="center" width="5%"><?php //echo $active_date?></td-->
                                  <td align="center" width="5%"><a href="status_update_news.php?news=<?php echo $news?>&status=<?php echo $status?>&active_date=<?php echo $active_date?>&current_sno=<?php echo $current_sno?>"><?php if($status == '1'){echo "Activated" ;}else{ echo "Deactivated" ;}?></a></a></td>
                                
                               <td align="center" width="10%" bgcolor="#FFFFFF">
                                 <a href="news_edit.php?news=<?php echo $news?>&status=<?php echo $status?>&active_date=<?php echo $active_date?>&current_sno=<?php echo $current_sno?>" id="edit_button" name="edit_button">
                                <img src="image/icons/user_edit.png" title="Edit News" width="16" height="16"/>
                                </a>

                               <a href="news_delete.php?news=<?php echo urlencode($news)?>&status=<?php echo $status?>&active_date=<?php echo $active_date?>&current_sno=<?php echo $current_sno?>" id="delete_button" name="delete_button">
                                <img src="image/icons/user_delete.png" title="Delete News" width="16" height="16"/>
                                </a>
                               
                                
                                
         
                                </td>
                               
								</tr>
                               

<?php } ?>
							</tbody>
						</table>
						</div>
				</div>
						<!-- table action -->
						
				<!-- end table -->
			  <div id="boxes">
<div style="top: 199.5px; left: 551.5px; display: none;" id="dialog"

class="window">

<a href="#" class="close" style="position:relative;float:right; font-weight:bold;">X</a>
<br />
<p align="center" style=" font-weight:lighter;">One news must be active at a time</p>
</div>
<!-- Mask to cover the whole screen -->
<div style="width: 1478px; height: 602px; display: none; opacity: 0.8;"

id="mask"></div>
</div>	
</body></html>