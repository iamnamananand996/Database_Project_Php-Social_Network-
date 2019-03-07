<?php
//index.php

include('database_connection.php');
if(!isset($_SESSION["user_id"]))
{
 header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Social Network</title>
  <link rel="icon" type="image/png" href="images/icons/group1.png"/>
  <!-- <script src="js/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/css/mdb.min.css" /> -->
  <!-- <link rel="stylesheet" href="css/animate.css"> -->
  <!-- <link rel="stylesheet" href="css/animate2.css"> -->
  
  <script src="js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.7/js/mdb.min.js"></script> -->
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">SOCIAL NETWORK</h2>
   <br />
   <div align="right">
    <a href="logout.php">Logout</a>
   </div>
   <br />
   <nav class="navbar ">
      <div class="container-fluid">
      <div class="navbar-header">
           <a class="" href="user_detail.php?id=<?php echo $_SESSION['user_id'];?>">
            <img src="images/<?php echo $_SESSION['user_image'];?>" class="animated infinite bounce slower " width="70" height="70" />
            </a>
        </div>
        <div class="navbar-header">
           <a class="navbar-brand" href="user_detail.php?id=<?php echo $_SESSION['user_id'];?>"> &nbsp;&nbsp;
           <?php echo $_SESSION['user_name']; ?></a>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="change_password.php?id=<?php echo $_SESSION['user_id'];?>">Change Password</a></li>
        <li><a href="search_friend.php">Find Friend</a></li>
        <li><a href="chat_page.php">Online Friend</a></li>
        </ul>
        <!-- <div>
        <a href="change_password.php?id=<?php echo $_SESSION['user_id'];?>" >Change Password</a>
        </div>
        <div>
        <a href="search_friend.php">Find Friend</a>
        </div> -->
        <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> Notification</a>
            <ul class="dropdown-menu"></ul>
           </li>
        </ul>

      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle cmt" data-toggle="dropdown"><span class="label label-pill label-danger count1" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
      </ul>



      </div>
   </nav>
   <br />
   <br />
   <!-- <form method="post" id="form_wall">
    <textarea name="content" id="content" class="form-control" placeholder="Share any thing what's in your mind"></textarea>
    <br />
    <div align="right">
     <input type="submit" name="submit" id="submit" class="btn btn-primary btn-sm" value="Post" />
    </div>
   </form> -->

  <form method="post" id="comment_form">
    <div class="form-group">
     <label>Enter Subject</label>
     <input type="text" name="subject" id="subject" class="form-control">
    </div>
    <div class="form-group">
     <label>Enter Post</label>
     <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="submit" name="post" id="post" class="btn btn-info btn-lg" value="What you think" style="background-color: #4BCFFA" />
    </div>
   </form>



   
   <br />
   <br />
   
   
   <br />
   <br />
   <h4>Latest Post</h4>
   <br />
   <div id="website_stuff"></div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 load_stuff();

 function load_stuff()
 {
  $.ajax({
   url:"load_stuff.php",
   method:"POST",
   success:function(data)
   {
    $('#website_stuff').html(data);
   }
  })
 } 
 $('#form_wall').on('submit', function(event){
  event.preventDefault();
  if($.trim($('#content').val()).length == 0)
  {
   alert("Please Write Something");
   return false;
  }
  else
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'done')
     {
      $('#form_wall')[0].reset();
      load_stuff();
     }
    }
   })
  }
 });

 $(document).on('click', '.like_button', function(){
  var content_id = $(this).data('content_id');
  $(this).attr('disabled', 'disabled');
  $.ajax({
   url:"like.php",
   method:"POST",
   data:{content_id:content_id},
   success:function(data)
   {
    if(data == 'done')
    {
     load_stuff();
    }
   }
  })
 });

 load_unseen_notification();

 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"load_notification.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  })
 }
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 








 function load_unseen_notification1(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count1').html(data.unseen_notification);
    }
   }
  });
 }

 load_unseen_notification1();

 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert1.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification1();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });

 $(document).on('click', '.cmt', function(){
  $('.count1').html('');
  load_unseen_notification1('yes');
 });

 setInterval(function(){
  load_unseen_notification1();;
 }, 5000);








});
 
</script>
