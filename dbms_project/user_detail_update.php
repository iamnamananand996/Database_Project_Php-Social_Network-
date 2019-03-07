<?php

include("database_connection.php");

if(!isset($_SESSION["user_id"]))
{
 header("location:login.php");
  
}

if(isset($_SESSION["user_id"]))
{

    $user_id = $_SESSION["user_id"];

 $output = '';
 $query = "
 SELECT * FROM `about_user` where user_id=$user_id
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_rows = $statement->rowCount();
 if($total_rows > 0)
 {
    foreach($result as $row)
        {

            $firstnamedb = $row["firstname"];
            $lastnamedb = $row["lastname"];
            $birthdatedb = $row["birthdate"];
            $conturydb = $row["contury"];
            $occupationdb = $row["occupation"];
            $email_iddb = $row["email_id"];
            $mobile_phonedb = $row["mobile_phone"];
            $experiencedb = $row["experience"];
            $aboutdb = $row["about"];
            $addressdb = $row["address"];
            $twitterdb = $row["twitter"];
        }
    }
 }
    
    if (empty($_POST["firstname"])) {
        # code...
        $firstname = $firstnamedb;
    } else {
        # code...
        $firstname = $_POST["firstname"];
    }

    if (empty($_POST["lastname"])) {
        # code...
        $lastname = $lastnamedb;
    } else {
        # code...
        $lastname = $_POST["lastname"];
    }

    if (empty($_POST["birthdate"])) {
        # code...
        $birthdate = $birthdatedb;
    } else {
        # code...
        $birthdate = $_POST["birthdate"];
    }

    if (empty($_POST["contury"])) {
        # code...
        $contury = $conturydb;
    } else {
        # code...
        $contury = $_POST["contury"];
    }


    if (empty($_POST["occupation"])) {
        # code...
        $occupation = $occupationdb;
    } else {
        # code...
        $occupation = $_POST["occupation"];
    }

    if (empty($_POST["email_id"])) {
        # code...
        $email_id = $email_iddb;
    } else {
        # code...
        $email_id = $_POST["email_id"];
    }

    if (empty($_POST["mobile_phone"])) {
        # code...
        $mobile_phone = $mobile_phonedb;
    } else {
        # code...
        $mobile_phone = $_POST["mobile_phone"];
    }

    if (empty($_POST["experience"])) {
        # code...
        $experience = $experiencedb;
    } else {
        # code...
        $experience = $_POST["experience"];
    }

    if (empty($_POST["about"])) {
        # code...
        $about = $aboutdb;
    } else {
        # code...
        $about = $_POST["about"];
    }

    if (empty($_POST["address"])) {
        # code...
        $address = $addressdb;
    } else {
        # code...
        $address = $_POST["address"];
    }

    if (empty($_POST["twitter"])) {
        # code...
        $twitter = $twitterdb;
    } else {
        # code...
        $twitter = $_POST["twitter"];
    }
    

    $query3 = "
    UPDATE about_user
    SET `firstname` = '$firstname', `lastname`= '$lastname', `birthdate` = '$birthdate', `contury`='$contury', 
    `occupation`='$occupation', `email_id`='$email_id', `mobile_phone`= '$mobile_phone', `experience`='$experience', 
    `about`='$about', `address`='$address', `twitter`= ' $twitter' WHERE user_id = $user_id
    ";
    $statement3 = $connect->prepare($query3);
    
    // $result1 = $statement1->fetchAll();
   
    if($statement3->execute())
    {
            echo "Detials updated";
            header("Location: user_detail.php");
    }





?>