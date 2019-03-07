<?php
include("connect.php");


$query1 = "
DROP PROCEDURE IF EXISTS ROWPERROW;
";
mysqli_query($connect, $query1);
$query2 = "
CREATE PROCEDURE ROWPERROW()
BEGIN
DECLARE n INT DEFAULT 1;
DECLARE i INT DEFAULT 1;
SELECT COUNT(*) FROM user_details INTO n;
SET i=1;
WHILE i<=n DO 
  INSERT INTO user_comment_seen(content_id, user_id) VALUES(25, i);
  SET i = i + 1;
END WHILE;
End;
";
mysqli_query($connect, $query2);
$query3 = "
CALL ROWPERROW();
";
 mysqli_query($connect, $query3);


?>