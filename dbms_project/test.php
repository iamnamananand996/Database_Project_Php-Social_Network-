<?php
include('database_connection.php');

if(!isset($_SESSION["user_id"]))
{
 header("location:login.php");
  
}
 echo $_SESSION["user_id"];

if(isset($_SESSION["user_id"]))
{
 $output = '';
 $query = "
 SELECT * FROM `about_user` where id=1;
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

            <div>   <p>this is division</p> 
            <?php    echo $row["firstname"];
            
            echo $row["lastname"];
       echo $row["id"];
       echo $row["email_id"];
            
            ?>
            
            </div>

       
       
<?php
    }
        
      


 }
 else
 {
  $output = 'Nobody has share nothing';
 }
//  echo $output;
}

?>


