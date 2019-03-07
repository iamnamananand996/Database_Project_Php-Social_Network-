<?php
include('database_connection.php');


if(!isset($_SESSION["user_id"]))
{
 header("location:login.php");
  
}



// if(isset($_POST["add_friend"]))
// {

//  $user_from = $_SESSION["user_id"];
// //  echo "$user_id";
//  $user_to =  $_GET["user_id"];

//   $query = "INSERT INTO `friend_request` (`id`, `user_from`, `user_to`, `status`) VALUES (NULL, '$user_from', '$user_to', 'PENDING');";
//   $statement = $connect->prepare($query);

//   if($statement->execute())
//     {
//             echo "Friend Request Sent";
//             // header("Location: user_detail.php");
//     }
// }

?>







<!DOCTYPE html>
<html>
<head>
<title>Social Network</title>
<link rel="icon" type="image/png" href="images/icons/group1.png"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 200px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<!-- <h2 style="text-align:center">User Profile Card</h2> -->



<?php

if(isset($_SESSION["user_id"]))
{
  $user_id = $_SESSION["user_id"];
 $output1 = '';
 $query1 = "
 SELECT b.user_image, b.user_name, b.user_id from friend_request a, user_details b where a.user_to = b.user_id and a.user_from = '$user_id' and status='ACCEPTED'
 ";
 $statement1 = $connect->prepare($query1);
 $statement1->execute();
 $result1 = $statement1->fetchAll();
 $total_rows1 = $statement1->rowCount();
 if($total_rows1 > 0)
 {
    foreach($result1 as $row1)
    {
     ?>


          <!-- <img src="images/" class="img-responsive" /> -->
        <form action="friend_detail.php?user_id=<?php echo $row1['user_id'];?>" method="post">
          <div class="col-sm-3">
             <div class="card">
               <img src="images/<?php echo $row1["user_image"]?>" alt="John" style="width:50%" >
               <h3><?php echo $row1["user_name"]?></h3>
             <div style="margin: 24px 0;">    
                 <button type="submit" name="view_details" >View Details</button>
                
             </div>
             </div>
           </div>
        </form>

<?php

    }
  }
}

?>


</body>
</html>
