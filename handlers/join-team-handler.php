<?php
  session_start();
  include '../database/connection.php';
  $status = $_REQUEST['appstatus'];
  $appid = $_REQUEST['appid'];

  $query = "SELECT * FROM `join-team-app` WHERE id = '$appid'";
  $result = mysqli_query($date, $query);
  $application = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($status == 'accepted') {
    $teamid = $application['teamid'];
    $userid = $application['userid'];

    $query = "SELECT * FROM teams WHERE id = '$teamid'";
    $result = mysqli_query($date, $query);
    $team = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $uni = $team['uni'];

    if ($team['class'] == 'CV') {
      $group = 'FSC team member';
    } else {
      $group = 'FSE team member';
    }

    $query = "UPDATE `users` SET teamid = '$teamid', `group` = '$group' WHERE id = '$userid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
    $entryyear = date("Y");
    $query = "INSERT INTO `user-team-info` VALUES (NULL, '$userid', '$uni', '', '', '$entryyear', '', 'Team member')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $query = "DELETE FROM `join-team-app` WHERE id = '$appid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }



    // $message = "Ваша заявка на участие в соревновании подтверждена!\n";
  	// $message = wordwrap($message, 70);
  	// mail($email, 'FSR application', $message);
  }

?>
