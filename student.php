<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: start.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: start.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header_">
	<h1 class="college_name">Demo College</h1>
	<?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>	
    <?php endif ?>
	<a class="login-button" href="student.php?logout='1'">Logout</a>
</div>

<div>
	<ul class="nav">
	<li class="nav-link"><a <?php if (isset($_GET['profile'])) {echo ('class="active"');} ?> href="student.php?profile='1'">Profile</a></li>
	<li class="nav-link"><a <?php if (isset($_GET['studentDetails'])) {echo ('class="active"');} ?> href="student.php?studentDetails='1'">Application Details</a></li>
	<li class="nav-link"><a <?php if (isset($_GET['studentStatus'])) {echo ('class="active"');} ?> href="student.php?studentStatus='1'">Application Status</a></li>
	</ul>
</div>

<div class="inner_container">
	<?php include('studentProfile.php') ?>
	<?php include('studentDetails.php') ?>
	<?php include('studentStatus.php') ?>
</div>



    <!-- logged in user information -->
    
</body>
</html>