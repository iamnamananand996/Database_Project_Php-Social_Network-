<?php
//insert1.php
include("connect.php");
  $user_id = $_SESSION["user_id"];

// if(isset($_POST["subject"]))
// {
//  include("connect.php");
//  $subject = mysqli_real_escape_string($connect, $_POST["subject"]);
//  $comment = mysqli_real_escape_string($connect, $_POST["comment"]);
 $query = "
 INSERT INTO comments(user_id,comment_subject, description)
 VALUES ($user_id,'subject', 'comment')
 ";
 mysqli_query($connect, $query);
// // }



$query1 = "
SELECT * FROM comments ORDER BY content_id DESC LIMIT 1
 ";
 $result1 = $connect->query($query1);
 if ($result1->num_rows > 0)
  {
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        $content_id =  $row1["content_id"];
        echo $content_id;

        $query2 = "
        DROP PROCEDURE IF EXISTS ROWPERROW;
        ";
        mysqli_query($connect, $query2);
        $query3 = "
        CREATE PROCEDURE ROWPERROW()
        BEGIN
        DECLARE n INT DEFAULT 1;
        DECLARE i INT DEFAULT 1;
        SELECT COUNT(*) FROM user_details INTO n;
        SET i=1;
        WHILE i<=n DO 
          INSERT INTO user_comment_seen(content_id, user_id) VALUES($content_id, i);
          SET i = i + 1;
        END WHILE;
        End;
        ";
        mysqli_query($connect, $query3);
        $query4 = "
        CALL ROWPERROW();
        ";
         mysqli_query($connect, $query4);



    }
  }



?>
