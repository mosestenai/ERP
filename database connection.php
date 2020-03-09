<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$minpassword = 7;
$host="ec2-50-17-178-87.compute-1.amazonaws.com";
$user="bhresqueirgmhk";
$password="bd44da77895bfdf44dd435fdfec6c081e5cece3f477d06a713be1786b434a9a1";
$dbname="d1jqghp24fspea";
$port="5432";

// database connection
$db =  new mysqli($host, $port , $dbname , $user , $password);



?>