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
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header_">
	<h1 class="college_name">Demo College</h1>
	<?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
	<a class="login-button" href="admin.php?logout='1'">Logout</a>
</div>

<div>
	<ul class="nav">
	<li class="nav-link"><a <?php if (isset($_GET['adminProfile'])) {echo ('class="active"');} ?> href="admin.php?adminProfile='1'">Profile</a></li>
	<li class="nav-link"><a <?php if (isset($_GET['adminDetails'])) {echo ('class="active"');} ?> href="admin.php?adminDetails='1'">Admission Details</a></li>
	<li class="nav-link"><a <?php if (isset($_GET['adminDash'])) {echo ('class="active"');} ?> href="admin.php?adminDash='1'">Admission Dashboard</a></li>
	</ul>
</div>

<div class="inner_container">
	<?php include('adminProfile.php') ?>
	<?php include('adminDetails.php') ?>
	<?php include('adminDash.php') ?>
</div>

</body>
</html>