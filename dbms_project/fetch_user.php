<?php

//fetch_user.php

include('database_connection1.php');

session_start();

// $query = "
// SELECT * FROM user_details
// WHERE user_id != '".$_SESSION['user_id']."'
// ";
$user_id = $_SESSION['user_id'];
$query = "
 SELECT b.user_image, b.user_name, b.user_id from friend_request a, user_details b where a.user_to = b.user_id and a.user_from = '$user_id' and status='ACCEPTED'
 ";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <th width="70%">Username</td>
  <th width="20%">Status</td>
  <th width="10%">Action</td>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success" style="background-color: #45CE30" >Online</span>';
 }
 else
 {
  $status = '<span class="label label-danger" style="background-color: #E8290B">Offline</span>';
 }
 $output .= '
 <tr>
  <td>'.$row['user_name'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
  <td>'.$status.'</td>
  <td><button type="button" style="background-color: #25CCF7" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['user_name'].'">Start Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>
