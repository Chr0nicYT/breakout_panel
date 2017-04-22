<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include('instinit.php'); // Includes Login Script
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Breakout | Install</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <p><font color="42f47a"><h1>Breakout</h1></font></p>
  </div>
  <h2 class="form-heading">Install</h2>
  <div class="app-cam">
	  <form action="" method="post">
		MySQL Password: <input type="password" id="password" name="password" value="DB Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DB Password';}">
		<div class="submit"><input name="submit" type="submit" value="
Login"></div>
		<div class="login-social-link">
                <span><?php echo $error; ?></span>
        </div>
	</form>
  </div>
   <div class="copy_layout login">
      <p>Panel developed by: We__Create | Panel design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
   </div>
</body>
</html>

