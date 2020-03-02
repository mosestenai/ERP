<?php
//checking if the submit button in the create new password file was clicked
if (isset($_POST["reset-linkk-submit"])){
  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwd-repeat"];
  
  if (empty($password) || empty($passwordRepeat)) {
    header("Location: create new password.php?newpwd=empty");
	exit();
  }elseif($password != $passwordRepeat){
     header("Location: create new password.php?newpwd=pwdnotsame");
	 exit();
  }
  //checking if token has expired
  $currentDate = date("U");
  
  require 'database connection.php';//including database connection file
  
  //sql statement to select the actual token
   $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
   $stmt = mysqli_stmt_init($db);//prepare statement
   if (!mysqli_stmt_prepare($stmt, $sql)) {//error message if the sql command was unsuccesfull
   echo "There was an error!!";
   exit();
   }else {//picking the correct token using selector
   mysqli_stmt_bind_param($stmt, "s", $selector);
   mysqli_stmt_execute($stmt);
   
   $result = mysqli_stmt_get_result($stmt); //getting result from the statement
   //fetch row that contains the token and stores inside associative array
   if (!$row = mysqli_fetch_assoc($result)) {
   echo "You need to re-submit your reset request.";
   exit(); 
   
   }//match the token from the form and that from the database
   else{
    //convert validator token from hexadecimal to binary
	$tokenBin = hex2bin($validator);
	$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
	
	if ($tokenCheck === false){
	echo "You need to re-submit your reset request.";
	exit();
	}// uodate the user credentials
	elseif($tokenCheck === true){
	
	$tokenEmail = $row['pwdRestEmail'];
	$sql = "SELECT * FROM users WHERE email=?;";
    $stmt = mysqli_stmt_init($db);//prepare statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {//error message if the sql command was unsuccesfull
    echo "There was an error!!";
    exit();
	}else {
	  mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
	  mysqli_stmt_execute($stmt);
	  $result = mysqli_stmt_get_result($stmt);
	  if (!$row = mysqli_fetch_assoc($result)) {
	  echo "There was an error!!";
	  exit();
	  }else{
	  
	  $sql = "UPDATE users SET password=? WHERE email=?";
	  $stmt = mysqli_stmt_init($db);//prepare statement
      if (!mysqli_stmt_prepare($stmt, $sql)) {//error message if the sql command was unsuccesfull
      echo "There was an error!!";
      exit();
	  }else {
	  //encrypting the password that wa reset by the user
	   $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
	   mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
	   mysqli_stmt_execute($stmt);
	   
	   $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";//sql to delete any existing token
       $stmt = mysqli_stmt_init($db);//prepare statement
       if (!mysqli_stmt_prepare($stmt, $sql)) {//error message if the sql command was unsuccesfull
       echo "There was an error!!";
       exit();}
	   }else {//replacing the question mark in sql before executing the statement
       mysqli_stmt_bind_param($stmt, "s", $userEmail);
       mysqli_stmt_execute($stmt);
	   header("Location: login.php?newpwd=passwordupdated");
       }
	  }
	}
   
   
   }
 }
   
   }
  }else{
  header("Location: ..login.php");
  }