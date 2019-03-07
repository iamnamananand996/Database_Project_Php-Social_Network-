<?php
//change_password.php
include('database_connection.php');
if(!isset($_SESSION["user_id"]))
{
 header("location:login.php");
  
}

// echo $_SESSION["user_id"];

if(isset($_POST["changepassword"]))
{

    $newpwd = $_POST['newpassword'];
    $user_id = $_SESSION["user_id"];
    // echo $user_id;

    if(($_POST["newpassword"] != $_POST["renewpassword"]))
    {
     
        echo 'Password doesnot match';
     //header("location:index.php");
    }
    else
    {
        $query = "UPDATE user_details set user_password ='$newpwd' where user_id ='$user_id'";
        $statement = $connect->prepare($query);
        $statement->execute();

    //   echo 'password changeed';
        // $message = "password changed";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // header("location:index.php");
        echo "<script>
alert('password changed');
window.location.href='index.php';
</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Social Network</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/group1.png"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Change Password</h2>
  <form method="post">
    <div class="form-group">
      <label for="email">Old Password</label>
      <input type="password" class="form-control" id="email" placeholder="Older password" name="oldpassword" required>
    </div>
    <div class="form-group">
      <label for="email">New Password</label>
      <input type="password" class="form-control" id="email" placeholder="new password" name="newpassword" required>
    </div>
    <div class="form-group">
      <label for="pwd">Reeneter new Password</label>
      <input type="password" class="form-control" id="pwd" placeholder="reenter new password" name="renewpassword" required>
    </div>
    <!-- <button type="submit" class="btn btn-success">Submit</button> -->
    <input type="submit" name="changepassword" id="changepassword" class="btn btn-success" value="Change Password" />
  </form>
</div>

</body>
</html>



