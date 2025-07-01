<?php
$host ="localhost";
$user ="root";
$password="";
$db_name ="koren";
$con =mysqli_connect($host,$user,$password,$db_name);
if(!$con){
    die("the resion :". mysqli_connect_error());
}
?>