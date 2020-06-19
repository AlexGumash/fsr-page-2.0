<?php
  session_start();
  include '../database/connection.php';
  $status = $_REQUEST['appstatus'];
  $appid = $_REQUEST['appid'];
  $isFa = $_REQUEST['faFlag'];


  if ($status == 'accepted') {
    if ($isFa == 'fa') {
      $query = "SELECT * FROM `join-team-fa-app` WHERE id = '$appid'";
      $result = mysqli_query($date, $query);
      $application = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
      $query = "INSERT INTO `user-team-info` VALUES (NULL, '$userid', '$teamid', '$uni', '', '', '$entryyear', '', '', '', '', '', 'Faculty advisor')";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }

      $query = "DELETE FROM `join-team-fa-app` WHERE id = '$appid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }

      $query = "SELECT * FROM users WHERE id = '$userid'";
      $result = mysqli_query($date, $query);
      $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $email = $user['email'];
      $subject = "Formula Student Russia Website";
      $message = 'You are Team faculty advisor of team "' . $team['name'] . '"';
      $headers = "Content-type: text/html";
      mail($email, $subject, $message, $headers);

    } else {
      $query = "SELECT * FROM `join-team-app` WHERE id = '$appid'";
      $result = mysqli_query($date, $query);
      $application = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
      $query = "INSERT INTO `user-team-info` VALUES (NULL, '$userid', '$teamid', '$uni', '', '', '$entryyear', '', '', '', '', '', '')";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }

      $query = "DELETE FROM `join-team-app` WHERE id = '$appid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }

      $query = "SELECT * FROM users WHERE id = '$userid'";
      $result = mysqli_query($date, $query);
      $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $email = $user['email'];
      $subject = "Formula Student Russia Website";
      $message = 'You are participant of team "' . $team['name'] . '"';
      $headers = "Content-type: text/html";
      mail($email, $subject, $message, $headers);

    }

    // $message = "Ваша заявка на участие в соревновании подтверждена!\n";
  	// $message = wordwrap($message, 70);
  	// mail($email, 'FSR application', $message);
  }

?>
