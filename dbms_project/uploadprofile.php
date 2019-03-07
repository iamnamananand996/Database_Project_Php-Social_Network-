<?php

include('database_connection.php');
if(!isset($_SESSION["user_id"]))
{
 header("location:login.php");
  
}

$user_id = $_SESSION["user_id"];
$img = $_POST["fileToUpload"];
echo $img;

if(isset($_POST["submit"]))
{
    $query1 = "
    UPDATE `user_details` SET `user_image` = '$img' WHERE `user_details`.`user_id` = $user_id;
    ";
    $statement1 = $connect->prepare($query1);
    $statement1->execute();
    echo "update";
    header("location:user_detail.php?id=$user_id");
}








?>