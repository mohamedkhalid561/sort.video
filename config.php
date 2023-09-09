<?php

$host= "127.0.0.1";//رقم الهوست
$user="root";//اليوزر
$password="";//الباسورد
$database="tutorial";//اسم الداتا بيز

$connect= mysqli_connect($host,$user,$password,$database);//دالة الكونكت

if(!$connect){

    die("the resinon :". mysqli_connect_error());
    
}
?>
