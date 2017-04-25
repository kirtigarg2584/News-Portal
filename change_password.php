<?php 
session_start();

if(!isset($_SESSION['username']))
{
header("Location: login.php");
}
include("opendb.php");

if(isset($_REQUEST['submit-go']))
{
 $username = $_SESSION['username'];
$old_password=$_REQUEST['old_password'];
$new_password=$_REQUEST['new_password'];

 $query = "select user_id from user_info1 where user_id = '$username' and user_pwd='$old_password'";
  $result =  mysql_query($query);
  $row = mysql_fetch_row($result);
  if(!$row)
	{
	$status="<font color='red'><b>Error!!old password does not match</b></font>";
	}
  else{
	$query = "update user_info1 set  user_pwd='$new_password' where user_id = '$username'";
  	$result =  mysql_query($query);
	$status="<font color='green'><b>Your password updated successfully.</b></font>";
	}

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
        
		<link rel="stylesheet" type="text/css" media="all" href="cs/calendar.css">
<script type="text/javascript" src="cs/calendar.js"></script>
<script type="text/javascript" src="cs/calendar-en.js"></script>
<script type="text/javascript" src="cs/calendar-setup.js"></script>
		
		
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
		<script type="text/javascript">
			$(document).ready(function () {
				style_path = "resources/css/colors";

				$("#date-picker").datepicker();

				$("#box-tabs, #box-left-tabs").tabs();
			});
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
<script launguage="javascript">
function validate(form1)
{
var invalid = " "; // Invalid character is a space
var minLength = 6; // Minimum length
var maxLength = 12; // Maximum length
re = /^\w+$/;  
 if(document.myForm.old_password.value=='')
   {
    alert("Please Enter Your Password");
    form1.old_password.focus();
    return false;
   }
 if(document.myForm.new_password.value=='')
   {
    alert("Please Enter Your New Password");
    myForm.new_password.focus();
    return false;
   }
 if(document.myForm.confirm_password.value=='')
   {
    alert("Please Retype Your New Password");
    myForm.confirm_password.focus();
    return false;
   }
 if(document.myForm.confirm_password.value!==document.myForm.new_password.value)
   {
    alert("Error!!Retype Your New Password Correctly.New Password And Retype Password Must Be Same.");
    document.myForm.confirm_password.value="";
    myForm.confirm_password.focus();
    return false;
   }


else{
	return true;
    }
}
</script>

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
							
						</ul>
					</li>
					<li>
						<a href="" title="Events"><span class="icon"><img src="image/calendar.png" alt="Events"></span><span>Group</span></a>
						<ul style="visibility: hidden;">
							<li><a href="add_group.php">Add Group</a></li>
							<li class="last"><a href="view_group.php">View Group</a></li>
						</ul>
					</li>
			
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
						
						
							
	<form method="post" id="myForm" name="myForm" action="change_password.php" onsubmit="return validate(this);">
		
		
		<fieldset class="contact">
			<legend>Change Password Form</legend>
			<div>
				<label for="customer_name">Old Password</label> <input type="text" id="old_password" name="old_password" type="password" tabindex="2">
			</div>
			<div>
				<label for="login_id">New Password</label> <input id="new_password" name="new_password" type="password" tabindex="2">
			</div>
            <div>
				<label for="password">Confirm Password</label> <input  id="confirm_password" name="confirm_password" type="password" tabindex="2">
			</div>
<div>
<?php if(isset($status)){echo$status;}?>


</div>
			
		<div><input type="submit" id="submit-go" name="submit-go"></div>
	</form>
					</div>
				
				<!-- end table -->
				
				</body></html>