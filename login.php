<?php include('login server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="30">
</head>
<body>
<h1 align="middle"><font color="grey">LAIKIPIA <img src="C:\xampp\htdocs\registration\laikipia logo.PNG" width="50" height="50"/></font><font color="red">UNIVERSITY</font></h1>

  <div class="header"><h2>Login</h2>
  </div>
 	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div><br>
	
	Forgot password?<br><br>
	<?php
	if (isset($_GET["newpwd"])){
	 if  ($_GET["newpwd"] == "passwordupdated"){
	 echo '<p class="signupsuccess">Your password has been reset!</p>';
	 }
	}
	?>
	<a href="reset pass.php" title="click here to reset your password"><text>Click here</text></a> to reset your password<br><br>
  	<p>
  		Are you an existing student/Employee?<br>
		<a href="register.php" title="click here to create an account">Create an Account</a><br><br><br><br><br>
  	</p>
	<footer>
	&copy 2019 <font color="red"><u>laikipia university</u></font>.Designed by <font color="blue"><u>MOSES TENAI</u></font>
	</footer>
  </form>
</body>
</html>
