<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php

session_start();
require 'database connection.php';

//checking if the user has entered both the username and password
 if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($pdo, $_POST['username']);
  $password = mysqli_real_escape_string($pdo, $_POST['password']);
	//displaying an error message when a fied is empty
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
//checking in the database if the username and paaword exists
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($pdo, $query);
	//logging in the user if the credentials are found in the database
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}

  //displaying an error message if there password of username wrongly entered 
	else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>