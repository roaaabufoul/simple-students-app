<?php
$connection = mysqli_connect('localhost','root','', 'web_php');
   if(!$connection){
    die("connection faild".mysqli_connect_error());
   }

?> 