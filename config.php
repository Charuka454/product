<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "product";
$con = mysqli_connect($server_name,$user_name,$password,$db_name);

if($con==false){
    echo"you have error";
}
?>