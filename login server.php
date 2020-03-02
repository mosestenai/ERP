<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php

session_start();
//initializing variables
$username = "";
$email = "";
$errors = array();
$host="ec2-50-17-178-87.compute-1.amazonaws.com";
$user="bhresqueirgmhk";
$password="bd44da77895bfdf44dd435fdfec6c081e5cece3f477d06a713be1786b434a9a1";
$dbname="d1jqghp24fspea";
$port="5432";
//connecting to the database
$db = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname .";user=" . $user . ";password=" . $password ;

//checking if the user has entered both the username and password
 if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
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
  	$results = mysqli_query($db, $query);
	//logging in the user if the credentials are found in the database
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}//displaying an error message if there password of username wrongly entered 
	else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>