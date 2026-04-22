<?php
session_start();

$host = "localhost";
$user= "root";
$pass="";
$db = "socialmediaapp";

$conn= mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    echo "connection faild";
}else { 
    echo "connected";

    }

?>