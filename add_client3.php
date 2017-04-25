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
$confirmcode = confirmcode_generator();
if(isset($_REQUEST['submit-go']))
{
 
$customer_name=$_REQUEST['customer_name'];
$login_id=$_REQUEST['login_id'];
$password=$_REQUEST['password'];
$dob=$_REQUEST['dob'];
$charges=$_REQUEST['charges'];

$expire_date = $_REQUEST['expiry_date'];

$currentdate=date('Y-m-d H:i:s');
$aa=$_POST['lit'];
//($aa);
 $profile_group=implode('_',$aa);

global $confirmcode ;
$uid=$confirmcode;
$query="insert into customer(customer_name,login_id,password,date_of_birth,charges,profile,uid,active_date,status,expiry_date) values('$customer_name','$login_id','$password','$dob','$charges','$profile_group','$uid','$currentdate','0','$expire_date')";
$result=mysql_query($query) or die(mysql_error());
}


 
   
 ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Metal Admin Panel</title>
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
	<!--script type="text/javascript" src="js/date.js"></script-->        <!-- add profile js-->
	<!--script type="text/javascript" src="js/form.js"></script-->        <!-- add profile js-->
        
		<!-- scripts (custom) -->
		<script src="js/smooth.js" type="text/javascript"></script>
		<script src="js/smooth.menu.js" type="text/javascript"></script>
		<!--<script src="js/smooth.chart.js" type="text/javascript"></script>
		<script src="js/smooth.table.js" type="text/javascript"></script>
		<script src="js/smooth.form.js" type="text/javascript"></script>
		<script src="js/smooth.dialog.js" type="text/javascript"></script>
		<script src="js/smooth.autocomplete.js" type="text/javascript"></script>-->
		
		
		<link rel="stylesheet" type="text/css" media="all" href="cs/calendar.css">
<script type="text/javascript" src="cs/calendar.js"></script>
<script type="text/javascript" src="cs/calendar-en.js"></script>
<script type="text/javascript" src="cs/calendar-setup.js"></script>

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
	</head>
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
						
						
							
	<form method="post" id="myForm" action="add_client.php">
		
		
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
					
			<input name="fromdate" id="fromdate" class="form_input_text" size="15" value="<?php echo$fromdate?>" type="text" style="cursor: pointer">
	              <script type="text/javascript">
		          Calendar.setup
			      ({
			        inputField              : "fromdate",// ID of the input field
			        ifFormat                : "%Y-%m-%d 00:00:00",// the date format
			        button                  : "fromdate",// ID of the button
			        singleClick             :  true
			      });
 		       </script>
					</div>
				</fieldset>
			</div>
            <div>
				<label for="charges">Charges</label> <input type="text" id="charges" name="charges">
			</div>
			
            <div>
		
			   
			   		<div class="date">
				<fieldset>
					<legend><span>Expiry Date</span></legend>
					<div>
					<input name="fromdate" id="fromdate" class="form_input_text" size="15" value="<?php echo$fromdate?>" type="text" style="cursor: pointer">
	              <script type="text/javascript">
		          Calendar.setup
			      ({
			        inputField              : "fromdate",// ID of the input field
			        ifFormat                : "%Y-%m-%d 00:00:00",// the date format
			        button                  : "fromdate",// ID of the button
			        singleClick             :  true
			      });
 		       </script><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(DD/MM/YYYY)
					</div>
				</fieldset>
			</div>
			<table style='width:370px;'>

    <tr>
        <td style='width:160px;'>
            <b>Metals:</b><br/>
           <select multiple="multiple" id='lstBox1'>
                 <?php
                /*mysql_connect ("ebangup_tanuj","lokesh@4321","");
                mysql_select_db ("ebangup_signup");*/
                $select="result";
                if (isset ($select)&&$select!=""){
                $select=$_POST ['NEW'];
            }
            ?>
            <?php
                $list=mysql_query("select DISTINCT metal_name from metals order by metal_name asc");
            while($row_list=mysql_fetch_assoc($list)){
                ?>
                    <option value="<?php echo $row_list['metal_name']; ?>"<?php if($row_list['metal_name']==$select){ echo "selected"; } ?>>
                                         <?php echo $row_list['metal_name'];?>
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
        <b>Group: </b><br/>
        <select multiple="multiple" id='lstBox2' name="lit[]">
          <!--<option value="asp">ASP.NET</option>
          <option value="c#">C#</option>
          <option value="vb">VB.NET</option>
          <option value="java">Java</option>
          <option value="php">PHP</option>
          <option value="python">Python</option> --> 
        </select>
    </td>
</tr>
</table>
			
			
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
		
		<div><input type="submit" id="submit-go" name="submit-go"></div>
	</form>
					</div>
				
				<!-- end table -->
				
				</body></html>