<?php   session_start(); 
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  ?>

<!DOCTYPE html>
<html>
<head>
    <title>Demo College</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="body-html">

    <div class="header_">
        <h1 class="college_name">Demo College</h1>
            <div>
                <button type="button"  class="login-button" onclick="window.location.href = '#popup1'">Login</button>
                <button type="button" class="login-button" onclick="window.location.href = '#popup2'">Register</button>
            </div>
        
    </div>


    <div class="footer_">
    </div>

<!--Login Pop Up-->
    <div id="popup1" class="overlay">
	<div class="popup">
    <?php include('server.php') ?>
		<a class="close" href="#">&times;</a>
		<div class="contents">
            <div class="header">
                <h2>Login</h2>
            </div>
            <form class="wbg" method="post" action="#popup1">
            <?php include('errors.php') ?>
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" >
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="login_user">Login</button>
                </div>
                <p>
                    Not yet a member? <a href="#popup2">Register</a>
                </p>
            </form>
		</div>
	</div>
    </div>

<!--Login Pop Up End-->    

<!--Register Pop Up-->
    <div id="popup2" class="overlay">
	<div class="popup">
    <?php include('register.php') ?>
		<a class="close" href="#">&times;</a>
		<div class="contents">
            <div class="header">
                <h2>Register</h2>
            </div>    
            <form class="wbg" method="post" action="#popup2">
            <?php include('errors.php') ?>
                <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                </div>
                <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
                </div>
                <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
                </div>
                <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
                </div>
                <p>
                    Already a member? <a href="#popup1">Sign in</a>
                </p>
            </form>
		</div>
	</div>
    </div>

<!--Register End-->
</body>
</html>