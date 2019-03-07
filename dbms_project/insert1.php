<?php
//insert1.php
include("connect.php");
  $user_id = $_SESSION["user_id"];

if(isset($_POST["subject"]))
{
//  include("connect.php");
 $subject = mysqli_real_escape_string($connect, $_POST["subject"]);
 $comment = mysqli_real_escape_string($connect, $_POST["comment"]);
 $query = "
 INSERT INTO comments(user_id,comment_subject, description)
 VALUES ($user_id,'$subject', '$comment')
 ";
 mysqli_query($connect, $query);




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



  // sending mail code


  require 'PHPMailerAutoload.php';
  require 'credential.php';
  
  $mail = new PHPMailer;
  
  // $mail->SMTPDebug = 4;                               // Enable verbose debug output
  
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'tls://smtp.gmail.com:587';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to
  
  $mail->setFrom(EMAIL, 'Naman');
  // $mail->addAddress('joe@example.net', 'Joe User');
  $mail->addAddress('iamnamananand3@gmail.com'); 
  $mail->addAddress('iamnamananand4@gmail.com');    // Add a recipient
  $mail->addAddress('iamnamananand2@gmail.com');               // Name is optional
  $mail->addReplyTo(EMAIL);
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');
  
  // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML
  
  $mail->Subject = 'Post notification from Biet Social Network';
  $mail->Body    = $comment;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
  }






    require('textlocal.class.php');
    require('credential.php');

    $textlocal = new Textlocal(false, false,API);

    $numbers = array(MOBILE);
    $sender = 'TXTLCL';
    // $otp = mt_rand(100000,999999);

    $message = "Hello Sir you got a new Post ::: $comment";

    try {
        $result = $textlocal->sendSms($numbers, $message, $sender);
        setcookie('otp',$otp);
        echo "OTP Sended Success";
        print_r($result);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }








}
?>
