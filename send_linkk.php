<?php

if (isset($_POST["submit_email"])){

 $selector = bin2hex(random_bytes(8));
 $token = random_bytes(32);

//link to the reset password page and token
 $url = "hotspice-tenai.herokuapp.com/create-new-password.php?selector=" . $selector ."$validator=" . bin2hex($token);
//time at which the token expires
$expires = date("U") + 1800;
//including a file that contains database connection
 require 'database connection.php';
//fetching the submitted email
 $userEmail = $_POST["email"];

 $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";//sql to delete any existing token
 $stmt = mysqli_stmt_init($pdo);//prepare statement
 if (!mysqli_stmt_prepare($stmt, $sql)) {//error message if the sql command was unsuccesfull
 echo "There was an error!!";
 exit();
 }else {//replacing the question mark in sql before executing the statement
 mysqli_stmt_bind_param($stmt, "s", $userEmail);
 mysqli_stmt_execute($stmt);
 }
 $sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?,
 ?);";
 $stmt = mysqli_stmt_init($db);//prepare statement
 if (!mysqli_stmt_prepare($stmt, $sql)) {//error message if the sql command was unsuccesfull
 echo "There was an error!!";
 exit();
 }else {
 $hashedToken = password_hash($token, PASSWORD_DEFAULT);//encrypting the token using default hashing method
 mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
 mysqli_stmt_execute($stmt);
 }
 //closing the connection
 mysqli_stmt_close($stmt);
 mysqli_close($pdo);
 //sending email to the user
 $to = $userEmail;
 
 $subject = 'Reset  password for your account';
 //message to be sent to the user
 $message = '<p>We received a password reset request.The link to reset you password is below,if you did not make
 this request, you can ignore this email</p>';
 $message .='<p>Here is your password reset link: </br>';
 $message .='<a href="' . $url . '">' . $url . '</a></p>';//link to reset password
 
 $headers = "From: mmose <kipronotena@gmail.com>\r\n";//admin email
 $headers .="Reply-To: kipronotena@gmail.com\r\n";
 $headers .="Content-type: text/html\r\n";//line that allows html to be used in the email
 
 mail($to, $subject, $message, $headers);  //content of the email to be sent to the user
 
 header("Locations: reset pass.php?reset=success");//success message to be displayed in the reset password page
 

}else{
header("Location: login.php");
}
?>