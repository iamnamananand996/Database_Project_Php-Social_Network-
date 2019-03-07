<?php
//login.php

include("database_connection1.php");

session_start();

$message = '';

if(isset($_POST["login"]))
{

 if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
 {
  $message = '<label>Both Fields are required</label>';
 }
 else
 {
	$email = $_POST["user_email"];
  $query = "
  SELECT * FROM user_details
  WHERE user_email = :user_email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'user_email' => $_POST["user_email"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {

    if(($_POST["user_password"] == $row["user_password"]))
    {
     $_SESSION['user_id'] = $row['user_id'];
	 $_SESSION['user_name'] = $row['user_name'];
	 $_SESSION['user_image'] = $row['user_image'];

     $sub_query = "
     INSERT INTO login_details
     (user_id)
     VALUES ('".$row['user_id']."')
     ";
     $statement = $connect->prepare($sub_query);
     $statement->execute();
     $_SESSION['login_details_id'] = $connect->lastInsertId();


     header("location:index.php");
    }
    else
    {
	 $message = '<label>Wrong Password</label>';
	 



	 $query1 = "
	 SELECT update_time from password_update_log where user_email='$email' ORDER BY update_time DESC LIMIT 1
	 ";
	 $statement1 = $connect->prepare($query1);
	$statement1->execute();
	$result1 = $statement1->fetchAll();
	$total_rows1 = $statement1->rowCount();
	if($total_rows1 > 0)
	{
    foreach($result1 as $row1)
    {
		$update_time =  $row1['update_time'];
		echo "<script>
		alert('password changed at $update_time');
		</script>";
	}
	}








    }
   }
  }
  else
  {
   $message = '<label>Wrong Email Address</labe>';
  }
 }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Social Network</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/group1.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-002.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						User Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user_email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="user_password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login" id="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							<!-- Forgot -->
						</span>
						<a class="txt2" href="#">
							<!-- Username / Password? -->
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main_login.js"></script>

</body>
</html>
