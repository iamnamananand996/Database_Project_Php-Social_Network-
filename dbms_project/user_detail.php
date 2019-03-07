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
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <script src="js/user_detail.js"></script>

    <link rel="stylesheet" href="css/user_detail.css">
    <link rel="stylesheet" type="text/css" href="assets/css/Header-Icons.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css"  -->
       <!-- integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Document</title>
</head>
<body>




<nav class="navbar navbar-default" id="colorful-nav">
        <!-- <div class="container"> -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="contact"><a href="index.php"><span class="glyphicon glyphicon-home"></span><h5>HOME</h5></a></li>
                    <li class="profile"><a href="friends.php"><span class="glyphicon glyphicon-user"></span><h5>Friends</h5></a></li>
                    <li class="lists"><a href="friend_request.php"><span class="glyphicon glyphicon-plus"></span><h5>Friend Request</h5></a></li>
                    
                    
                    <li class=" statistics"><a href="chat_page.php"><span class="glyphicon glyphicon-user"></span><h5>Online Friend</h5></a></li>
                    <li class="about"><a href="search_friend.php"><span class="glyphicon glyphicon-search"></span><h5>Find Friend</h5></a></li>
                    <!-- <li class="contact"><a href="#"><span class="glyphicon glyphicon-earphone"></span><h5>CONTACT</h5></a></li> -->
                    <!-- <li class="statistics"><a href="#"><span class="glyphicon glyphicon-envelope"></span><h5>CONTACT</h5></a></li> -->
                    <!-- <li class="search"><a href="#"><span class="glyphicon glyphicon-envelope"></span><h5>SEARCH</h5></a></li> -->
                </ul>
            </div>
        <!-- </div> -->
    </nav>
    


  
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

$user_id = $_SESSION["user_id"];

if(isset($_SESSION["user_id"]))
{
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
          <div class="col-sm-3" style="margin-left: 100px" >
          <br>
          <form action="uploadprofile.php" method="post" >
               
            <input type="file" name="fileToUpload" id="fileToUpload" class="btn">
            <input type="submit" value="Change Profile" name="submit" class="btn">
        </form>
        </div>

<?php

    }
  }
}

?>


<?php

if(isset($_SESSION["user_id"]))
{
  $user_id = $_SESSION["user_id"];
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
            <!-- <a href="friends.php">Friends</a> -->
            <!-- <a href="friend_request.php">Friend Request</a> -->

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
      <li><a href="#change" role="tab" data-toggle="tab">
          <i class="fa fa-key"></i> Edit Profile
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
      

<?php

if(isset($_SESSION["user_id"]))
{
  $user_id = $_SESSION["user_id"];
 $output2 = '';
 $query2 = "
 SELECT * FROM `about_user` where user_id=$user_id;
 ";
 $statement2 = $connect->prepare($query2);
 $statement2->execute();
 $result2 = $statement2->fetchAll();
 $total_rows2 = $statement2->rowCount();
 if($total_rows2 > 0)
 {
    foreach($result2 as $row2)
    {
     ?>


      
<div class="tab-pane fade" id="change">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">

<h2 class="register">Edit Your Profile</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">

<form class="form-horizontal main_form text-left" action="user_detail_update.php" method="post"  id="contact_form">
<fieldset>



<div class="col-md-6">


        <div class="form-group col-md-12">
          <label class="col-md-10 control-label">First Name</label>  
          <div class="col-md-12 inputGroupContainer">
          <div class="input-group">
          <input  name="firstname" placeholder="<?php echo $row2["firstname"] ?>" class="form-control"  type="text">
            </div>
          </div>
        </div>



        <!-- Text input-->

        <div class="form-group col-md-12">
          <label class="col-md-10 control-label" >Last Name</label> 
            <div class="col-md-12 inputGroupContainer">
            <div class="input-group">
          <input name="lastname" placeholder="<?php echo $row2["lastname"] ?>" class="form-control"  type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->
              <div class="form-group col-md-12">
          <label class="col-md-10 control-label">Birthday</label>  
            <div class="col-md-12 inputGroupContainer">
            <div class="input-group">
          <input name="birthdate" placeholder="<?php echo $row2["birthdate"] ?>" class="form-control"  type="date" data-date-format="YYYY MM DD">
            </div>
          </div>
        </div>


        <!-- Text input-->
              
        <div class="form-group col-md-12">
          <label class="col-md-10 control-label">Contury</label>  
            <div class="col-md-12 inputGroupContainer">
            <div class="input-group">
          <input name="contury" placeholder="<?php echo $row2["contury"] ?>" class="form-control" type="text">
            </div>
          </div>
        </div>

        <!-- Text input-->
              
        <div class="form-group col-md-12">
          <label class="col-md-10 control-label">Occupation</label>
            <div class="col-md-12 inputGroupContainer">
            <div class="input-group">
                    <input  name="occupation" type="text" placeholder="<?php echo $row2["occupation"] ?>" class="form-control">
                    <!-- <textarea class="form-control" name="comment" placeholder="Project Description"></textarea> -->
          </div>
          </div>
        </div>


       <div class="form-group col-md-12">
      <label class="col-md-10 control-label">Email Id</label>
        <div class="col-md-12 inputGroupContainer">
        <div class="input-group">
                <input  name="email_id" type="email" placeholder="<?php echo $row2["email_id"] ?>" class="form-control">
                <!-- <textarea class="form-control" name="comment" placeholder="Project Description"></textarea> -->
      </div>
      </div>
    </div>

</div>



<div class="col-md-6">

    <div class="form-group col-md-12"> 
      <label class="col-md-10 control-label">Mobile Phone</label>
        <div class="col-md-12 selectContainer">
        <div class="input-group">
          <input type="text" name="mobile_phone" placeholder="<?php echo $row2["mobile_phone"] ?>" class="form-control">
      </div>
    </div>
    </div>


    <!-- Select Basic -->
      
    <div class="form-group col-md-12"> 
      <label class="col-md-10 control-label">Experience</label>
        <div class="col-md-12 selectContainer">
        <div class="input-group">
          <input type="text" name="experience" placeholder="<?php echo $row2["experience"] ?>" class="form-control">
      </div>
    </div>
    </div>



    <div class="form-group col-md-12"> 
      <label class="col-md-10 control-label">About</label>
        <div class="col-md-12 selectContainer">
        <div class="input-group">
        <!-- <input type="text" name="about" placeholder="<?php echo $row2["about"] ?>" class="form-control"> -->
        <textarea  placeholder="<?php echo $row2["about"] ?>" name="about" class="form-control"></textarea>
      </div>
    </div>
    </div>

    <div class="form-group col-md-12"> 
      <label class="col-md-10 control-label">Address</label>
        <div class="col-md-12 selectContainer">
        <div class="input-group">
        <input type="text" name="address" placeholder="<?php echo $row2["address"] ?>" class="form-control">
      </div>
    </div>
    </div>

    <div class="form-group col-md-12"> 
      <label class="col-md-10 control-label">Twiter</label>
        <div class="col-md-12 selectContainer">
        <div class="input-group">
        <input type="text" name="twitter" placeholder="<?php echo $row2["twitter"] ?>" class="form-control">
      </div>
    </div>
    </div>
</div>



<!-- </div>col-md-12 close -->
<!-- Button -->
<div class="form-group col-md-10">
  <div class="col-md-6">
    <button type="submit" class="btn btn-warning submit-button" >Save</button>
    <button type="submit" class="btn btn-warning submit-button" >Cancel</button>

  </div>
</div>
</fieldset>
</form>
</div><!--row close-->
</div><!--container close -->   


<?php

  }
 }
}

?>




</div><!--tab-pane close-->




</div><!--tab-content close-->
</div><!--container close-->

</section><!--section close-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>