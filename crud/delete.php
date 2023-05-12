<?php
include '../dbconnection.php';
session_start();

if($_GET['module']=='user'){
    $id=$_GET['id'];
    $sql1=$conn->query("SELECT image FROM user WHERE id='$id'");
    $row=$sql1 ->fetch_assoc();
    $sql=$conn->query("DELETE FROM user WHERE id='$id'");
    if($sql){
        unlink('../img/'.$row['image']);
    $_SESSION['status']="deleted successfully";
    header('Location:../index.php');
    }else{      
        $_SESSION['message']="Not deleted";
        header('Location:../index.php');
    }
}