<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$minpassword = 7;
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

//check connection
if (!$db){
die("Connection failed: ".mysqli_connect_error());
}