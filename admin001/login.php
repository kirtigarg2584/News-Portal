<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
		<title>Admin Panel</title>
        <link rel="shortcut icon" href="image/favicon.ico">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="../resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../resources/css/style.css" media="screen" />
		<link id="color" rel="stylesheet" type="text/css" href="../resources/css/colors/blue.css" />
		<!-- scripts (jquery) -->
		<script src="../resources/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
		<script src="../resources/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
		<script src="../resources/scripts/smooth.js" type="text/javascript"></script>
		<!--script type="text/javascript">
			$(document).ready(function () {
				style_path = "../resources/css/colors";

				$("input.focus").focus(function () {
					if (this.value == this.defaultValue) {
						this.value = "";
					}
					else {
						this.select();
					}
				});

				$("input.focus").blur(function () {
					if ($.trim(this.value) == "") {
						this.value = (this.defaultValue ? this.defaultValue : "");
					}
				});

				$("input:submit, input:reset").button();
			});
		</script-->
	</head>
	<body>
		<div id="login">
			<!-- login -->
			<div class="title">
				<h5>LOG IN-Master Panel</h5>
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
			<div class="messages">
				<?php $msg = $_GET['status']; echo "<h4 style=\"margin: 1px 2px;\">".$msg."</h4>"; ?>
			</div>
			<div class="inner">
				<form action="loginvalidation.php" method="post"  name="form" >
				<div class="form">
					<!-- fields -->
					<div class="fields">
						<div class="field">
							<div class="label">
								<label for="username">Username:</label>
							</div>
							<div class="input">
								<input type="text" id="username" name="username" size="40"  class="focus" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="password">Password:</label>
							</div>
							<div class="input">
								<input type="password" id="password" name="password" size="40"  class="focus" />
							</div>
						</div>
                         <p>&nbsp;</p>
                        <p><label style="size:500px; width:500px; color:#990033;"><?php echo "<b>".$status."</b>"; ?></label><br />
                      </p>
						<div class="field">
							<!--<div class="checkbox">
								<input type="checkbox" id="remember" name="remember" />
								<label for="remember">Remember me</label>
							</div>-->
						</div>
						<div class="buttons">
							<input type="submit" name="login" value="Login" />
						</div>
					</div>
					<!-- end fields -->
					<!-- links -->
					
					<!-- end links -->
				</div>
				</form>
			</div>
			<!-- end login -->
			
		</div>
	</body>

</html>