<?php 
session_start();
if(isset($_SESSION['username']))
{
  header('location:loginPage.php');
}
  else
  {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : OfficialWork 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20121012
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Nandi Sweets</title>
<link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery/jquery.gallerax-0.2.js"></script>
<style type="text/css">
@import "gallery.css";
</style>
</head>
<body>
<script type="text/javascript">alert()</script>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Nandi Sweets</a></h1>
		</div>
	</div>
	<!-- 
	
	<div id="banner"><img src="images/pics01.jpg" width="1000" height="361" alt="" /></div>end #header -->
	<div id="welcome">
		<h2 class="title" align="center"><a href="#">Nandi Sweets</a></h2>
	</div>
 
	<div>
    <p align="center">Welcome to Nandi Sweet Shop. Please login to continue.</p>
    <form action="mainpage.php" method="post">
	<table border='0' cellspacing='1' align="center">
        	<tr><td>UserName:</td><td> <input type="text" name="username"></td></tr>
      		<tr><td>Password:</td><td> <input type="password" name="password"></td></tr>
      		<tr> <td colspan="2" align="center"> <input type="submit" name="submit" value="submit"></td></tr>
	</table>  
    </form>
  	<div>
	<!-- end #page --> 
</div>
<div id="footer">
	<p>Copyright (c) 2012 . All rights reserved. Design by Mayank and Kshitij.</p>
</div>
<!-- end #footer -->
</body>
</html>
<?php
  }
?>
