<?php
include('database_connection.php');


if(!isset($_SESSION["user_id"]))
{
 header("location:login.php");
  
}
//  echo $_SESSION["user_id"];
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social Network</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="images/icons/group1.png"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="js/user_detail.js"></script>

    <link rel="stylesheet" href="css/user_detail.css">
    <!-- <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css"  -->
       <!-- integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Document</title>
</head>
<body>
    


  
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
     
      </div>
      
    </div>
  </div>
<br>
<br>
<br>

<section>

<div class="container" style="margin-top: 30px;">
<div class="profile-head">
<div class="col-md- col-sm-4 col-xs-12">

<?php

// $user_id = $_SESSION["user_id"];

if(isset($_POST["view_details"]))
{
    $user_id = $_GET["user_id"];
 $output1 = '';
 $query1 = "
 SELECT * FROM `user_details` where user_id=$user_id
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


          <img src="images/<?php echo $row1["user_image"]?>" class="img-responsive" />

<?php

    }
  }
}

?>


<?php

if(isset($_SESSION["user_id"]))
{
  $user_id = $_GET["user_id"];
 $output = '';
 $query = "
 SELECT * FROM `about_user` where user_id=$user_id;
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_rows = $statement->rowCount();
 if($total_rows > 0)
 {
    foreach($result as $row)
    {
     ?>

            <h6><?php echo $row["firstname"]."&nbsp;&nbsp;"; echo $row["lastname"]; ?></h6>
            </div><!--col-md-4 col-sm-4 col-xs-12 close-->


            <div class="col-md-5 col-sm-5 col-xs-12">
            <h5><?php echo $row["firstname"]."&nbsp;&nbsp;"; echo $row["lastname"]; ?></h5>
            <p><?php echo $row["occupation"] ?> </p>
            <ul>
            <li><span class="glyphicon glyphicon-briefcase"></span> <?php echo $row["experience"] ?> years</li>
            <li><span class="glyphicon glyphicon-map-marker"></span><?php echo $row["contury"] ?></li>
            <li><span class="glyphicon glyphicon-home"></span> <?php echo $row["address"] ?></li>
            <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call"><?php echo $row["mobile_phone"] ?></a></li>
            <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail"><?php echo $row["email_id"] ?></a></li>
            <!-- <a href="friends.php">Friends</a>
            <a href="friend_request.php">Friend Request</a> -->

            </ul>


            </div><!--col-md-8 col-sm-8 col-xs-12 close-->




</div><!--profile-head close-->
</div><!--container close-->


<div id="sticky" class="container">
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-menu" role="tablist">
      <li class="active">
          <a href="#profile" role="tab" data-toggle="tab">
              <i class="fa fa-male"></i> Profile
          </a>
      </li>
     
    </ul><!--nav-tabs close-->
    
    <!-- Tab panes -->
    <div class="tab-content">
    <div class="tab-pane fade active in" id="profile">
    <div class="container">

          <div>
              <div>      
                    <div class="col-sm-11" style="float:left;">
                            <div class="hve-pro">
                            <p>   <?php echo $row["about"]; ?>
                                </p>
                            </div><!--hve-pro close-->
                            </div><!--col-sm-12 close-->
                            <br clear="all" />
                            <div class="row">
                            <div class="col-md-12">
                            <h4 class="pro-title">Bio Graph</h4>
                            </div><!--col-md-12 close-->


                      <div class="col-md-6">

                      <div class="table-responsive responsiv-table">
                        <table class="table bio-table">
                          <tbody>
                        <tr>      
                            <td>Firstname</td>
                            <td>: <?php echo $row["firstname"]; ?></td> 
                        </tr>
                        <tr>    
                            <td>Lastname</td>
                            <td>: <?php echo $row["lastname"]; ?></td>       
                        </tr>
                        <tr>    
                            <td>Birthday</td>
                            <td>: <?php echo $row["birthdate"]; ?></td>       
                        </tr>
                        <tr>    
                            <td>Contury</td>
                            <td>:<?php echo $row["contury"]; ?></td>       
                        </tr>
                        <tr>
                            <td>Occupation</td>
                            <td>: <?php echo $row["occupation"]; ?></td> 
                        </tr>

                        </tbody>
                      </table>
                      </div><!--table-responsive close-->
                    </div><!--col-md-6 close-->

                      <div class="col-md-6">

                      <div class="table-responsive responsiv-table">
                      <table class="table bio-table">
                          <tbody>
                        <tr>  
                            <td>Emai Id</td>
                            <td>:<?php echo $row["email_id"]; ?></td> 
                        </tr>
                        <tr>    
                            <td>Mobile</td>
                            <td>: <?php echo $row["mobile_phone"]; ?></td>       
                        </tr>
                        
                        <tr>    
                            <td>Experience</td>
                            <td>: <?php echo $row["experience"]; ?> years</td>       
                        </tr>
                        <tr>
                            <td>Twiter</td>
                            <td><a href=""><?php echo $row["twitter"]?></a></td> 
                            
                        </tr>

                        </tbody>
                      </table>
                        </div><!--table-responsive close-->
                        </div><!--col-md-6 close-->

                      </div><!--row close-->
                    </div>
            </div>

<?php

    }
  }
}

?>

</div><!--container close-->
</div><!--tab-pane close-->
</div><!--tab-pane close-->
</div><!--tab-content close-->


</section><!--section close-->

</body>
</html>