<?php

  
   include('opendb.php');
   
  include('func2.php');
  
  
 

 
  


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<script type="text/javascript" src="jquery.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dialer</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="cs/calendar.css">
<script type="text/javascript" src="cs/calendar.js"></script>
<script type="text/javascript" src="cs/calendar-en.js"></script>
<script type="text/javascript" src="cs/calendar-setup.js"></script>
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
<script type="text/javascript">
function validate(form1)
{
if (document.form1.search_cust.value=="")
	{
	alert("Kindly Enter The Username");
	document.form1.search_cust.focus();
	return false;
	}
else{
	return true;
	}
}

</script>

<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#drop_1').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("func.php", {
		func: "drop_1",
		drop_var: $('#drop_1').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}

</script>




</head>

<body>



<div id="container">
<div id="header">
            <div id="topmenu">
            	<ul>
                    <li ><a href="tlindex.php">Home</a></li>
                    <li><a href="dataupload.php">Data Upload</a></li>           
                    <li class="current"><a href="mis.php">MIS Report</a></li>
                    <li><a href="assigncampaign.php">Assign Campaign</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
   	</div>
               
          <?php
		  include("tlleftpanel.php");
          ?>
          <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3 id="adduser">MIS Reports</h3>
                    <form id="form" name="form1" action="feedbackquery.php" method="post" onSubmit="return validate(this);">
                      
                       



  
 
   
 
         <p><font face="cursive" size="2px"><b>&nbsp;&nbsp;Contact Status</b></font>
                <select name="drop_1" id="drop_1">
                <option value="" selected="selected" disabled="disabled">Select Mis Report </option>
                <?php getTierOne(); ?>
                </select> 
                <span id="wait_1" style="display: none;"><img alt="Please Wait" src="ajax-loader.gif"/></span>
                <span id="result_1" style="display: none;"></span> 
                
     <br /><br /> From:<input name="fromdate" id="fromdate" class="form_input_text" size="20" value="<?php echo$fromdate?>" type="text" style="cursor: pointer">
	              <script type="text/javascript">
		          Calendar.setup
			      ({
			        inputField              : "fromdate",// ID of the input field
			        ifFormat                : "%Y-%m-%d 00:00:00",// the date format
			        button                  : "fromdate",// ID of the button
			        singleClick             :  true
			      });
 		       </script>&nbsp;&nbsp;&nbsp;&nbsp;(DD/MM/YYYY)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
			
         To :<input name="todate" id="todate" class="form_input_text" size="20" value="<?php echo $todate?> " type="text" style="cursor:pointer">
	    	 	<script type="text/javascript">
		    	 Calendar.setup
		     	 ({
			    inputField              : "todate",// ID of the input field
			    ifFormat                : "%Y-%m-%d 23:59:59",// the date format
			    button                  : "todate",// ID of the button   
			    singleClick             : true
		      	 });
		       </script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(DD/MM/YYYY)
        
    <br /> <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" value="Submit" name="cmd_apply" size="20" />
       
          </div>
            
</div>
                    
                    </form>


<p><span id="txtHint"></span></p> 



</body>
</html>

