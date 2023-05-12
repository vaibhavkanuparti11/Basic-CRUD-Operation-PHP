<?php
include '../dbconnection.php';
session_start();
echo "insert";

if($_POST['module']=='insert'){
    print_r($_POST);    
    $title=$_POST['title'];
    $descp=$_POST['descp'];
    $category=$_POST['category'];
    $tags=implode(",",$_POST['tags']);   
    $publish=$_POST['publish'];
    $date=$_POST['date'];
    $image = $_FILES['image']['name'];
    $path ='../img/'.basename($image);
    if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){ 
    $sql=mysqli_query($conn,"INSERT INTO `user`(`title`, `descp`, `category`, `tags`, `publish`, `date`, `image`)
     VALUES ('$title','$descp','$category','$tags','$publish','$date','$image')");
     if($sql){
        header('Location:../index.php');
        echo "inserted";
     }else{
        echo "not inserted";
     }


    }
}
