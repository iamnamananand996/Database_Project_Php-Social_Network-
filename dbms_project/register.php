<?php

include("database_connection1.php");
session_start();


if (isset($_POST['register'])) {
	
	$username = $_POST["username"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$pwd = $_POST["pwd"];
	$pwd2 = $_POST["pwd2"];

	// echo $username;
	// echo $email;
	// echo $phone;
	// echo $pwd;
	// echo $pwd2;

	if ($pwd == $pwd2) {
		# code...
	
	
	
	$query2 = "
	SELECT user_id from user_details ORDER BY user_id DESC LIMIT 1
	";
	$statement2 = $connect->prepare($query2);
   $statement2->execute();
   $result2 = $statement2->fetchAll();
   $total_rows2 = $statement2->rowCount();
   if($total_rows2 > 0)
   {
   foreach($result2 as $row2)
   {
	   $user_id = $row2["user_id"];
	   $user_id = $user_id+1;
   }
   }




	$query1 = "
	INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_image`) VALUES ('$user_id', '$email', '$pwd', '$username', 'user', 'default.png');
	";
	$statement1 = $connect->prepare($query1);
	$statement1->execute();
	$query3 = "
	INSERT INTO about_user (email_id,user_id) VALUES ('$email',$user_id);
	";
	$statement3 = $connect->prepare($query3);
	   


   if ($statement3->execute()) {
	   # code...
	   echo "<script>
alert('Hi $username your Registered Successfully');
window.location.href='loginuser.php';
</script>";

   }
//    $result1 = $statement1->fetchAll();
//    $total_rows1 = $statement1->rowCount();
//    if($total_rows1 > 0)
//    {
//    foreach($result1 as $row1)
//    {
// 	   $update_time =  $row1['update_time'];
// 	   echo "<script>
// 	   alert('password changed at $update_time');
// 	   </script>";
//    }
//    }

} else {
	# code...
	?>

	<div class="alert">
  		<span class="closebtn">&times;</span>  
  		<strong>Worng Password!</strong> Password and Confirm Password Does not match.
	</div>

<?php
}






	
} else {
	# code...
	
}






?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Social Network</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Quick Register Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/styleregister.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="css/style_add.css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">




<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>






</head>
<body>
<div class="signupform">
	<br><br><br>
<!-- <h1>User Register</h1> -->
	<div class="container">
		
		<div class="agile_info">
			<div class="w3_info">
				<h2>Register Here</h2>
						<form action="" method="post">
						<div class="">
							<label>User Name</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" name="username" placeholder="User Name" required=""> 
							</div>
						</div>
						<!-- <div class="left">
							<label>Last Name</label>
							<div class="input-group">
								<span><i class="fa fa-user" aria-hidden="true"></i></span>
								<input type="text" placeholder="Last Name" required=""> 
							</div>
						</div> -->
						<div class="left margin">
							<label>Email Address</label>
							<div class="input-group">
								<span><i class="fa fa-envelope" aria-hidden="true"></i></span>
								<input type="email" name="email" placeholder="Email" required=""> 
							</div>
						</div>
						<div class="left">
							<label>Phone Number</label>
							<div class="input-group">
								<span><i class="fa fa-phone" aria-hidden="true"></i></span>
								<input type="text" name="phone" placeholder="Phone Number" required="">
							</div>
						</div>
						<div class="left margin">
							<label>Password</label>
							<div class="input-group">
								<span><i class="fa fa-lock" aria-hidden="true"></i></span>
								<input type="Password" name="pwd" placeholder="Password" required="">
							</div>
						</div>
						<div class="left">
							<label>Confirm Password</label>
							<div class="input-group">
								<span><i class="fa fa-lock" aria-hidden="true"></i></span>
								<input type="Password" name="pwd2" placeholder="Confirm Password" required="">
							</div>
						</div>
						<div class="clear"></div>
							<input type="checkbox" value="remember-me" /> <h4> I agree to the terms & contidions </h4>        
							<button class="btn btn-danger1 btn-block" name="register" type="submit">Register Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button >                
					</form>
			</div>
			<div class="w3l_form">
				<div class="left_grid_info">
					<h3>Already Registered?</h3>
					<p> Nam eleifend velit eget dolor vestibulum ornare. Vestibulum est nulla, fermentum eget euismod et, tincidunt at dui. Nulla tellus nisl, semper id justo vel, rutrum finibus risus. Cras vel auctor odio.</p>
					<a href="loginuser.php" class="btn">Login <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="clear"></div>
			</div>
			
		</div>
		<div class="footer">

 <!-- <p>&copy; 2018 Quick Register form. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="blank">W3layouts</a></p> -->
 </div>
	</div>
	</body>
</html>