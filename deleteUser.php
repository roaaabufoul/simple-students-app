<?php
include_once('db_conn.php');
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query="Delete from users where id =$id";
    $result = mysqli_query($connection,$query);
if($result){
header('location:dashboard.php');
}else{
die(mysqli_error($connection));
}
}
?>