<?php
include '../dbconnection.php';
echo "hi";
session_start();
if($_POST['module']=='edit'){
    // print_r($row);
   $id=$_POST['id'];
   $title=$_POST['title'];
   $descp=$_POST['descp'];
   $category=$_POST['category'];
   $tags=implode(",",$_POST['tags']);
   $publish=$_POST['publish'];
   $date=$_POST['date'];    
   $old_image= $_POST['old_image'];
   $image = $_FILES['image']['name'];    
   $dest ='../img/'.basename($image);
   if(move_uploaded_file($_FILES['image']['tmp_name'],$dest)){        
      $old_image= $image;
      unlink('../img/'.$_POST['old_image']);
   }
   $sql_edit = $conn->query("UPDATE `user` SET `title`='$title',`descp`='$descp',`category`='$category',`tags`='$tags',`publish`='$publish',`date`='$date',`image`='$old_image' WHERE id=$id");
   if($sql_edit){
      $_SESSION['status']="updated successfully";
          header('Location:../index.php');
          }else{      
              $_SESSION['message']="Not updated";
              header('Location:../index.php');
      }
}