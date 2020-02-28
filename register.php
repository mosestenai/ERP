<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Registration system</title>
</head>
<body>
<h1 align="middle"><font color="grey">LAIKIPIA</font>  <font color="red">UNIVERSITY STUDENTS<br> PORTAL</font></h1>

  <link rel="stylesheet" type="text/css" href="style.css">
<fieldset>
<form method="post" action="register.php">
<?php include('errors.php'); ?>
<div class="input-group">
<label>Username</label>
<input type="text" name="username" value="<?php echo $username;?>">
</div><br>
<div class="input-group">
<label>Email</label>
<input type="email" name="email" value="<?php echo $email;?>">
</div><br>
<div class="input-group">
<label>Password</label>
<input type="password" name="password_1">
</div><br>
<div class="input-group">
<label>Confirm password</label>
<input type="password" name="password_2">
</div>
<br>
<div class="input-group">
<button type="submit" class="btn" name="reg_user">Register</button>
</div>
<p>
Already a student?<a href="login.php">	Log in</a>
</p><br>
&copy 2019 <font color="red"><u>laikipia university</u></font>.Designed by <font color="blue"><u>MOSES TENAI</u></font><br>
 <br>

</form>
</fieldset>
</body>

</html>