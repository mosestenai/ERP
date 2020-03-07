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
try{
// set DSN data source name
$dsn = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname .";user=" . $user . ";password=" . $password ;

//create a pdo instance
$pdo = new PDO($dsn, $user ,$password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
//check connection
catch (PDOExeption $e){
echo 'Connection failed: ' . $e->getMessage();
}

?>