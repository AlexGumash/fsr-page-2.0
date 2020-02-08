<?php
  session_start();
  include '../database/connection.php';
  $status = $_REQUEST['status'];
  $appid = $_REQUEST['appid'];

  $query = "SELECT * FROM `event-application` WHERE id = '$appid'";
  $result = mysqli_query($date, $query);
  $application = mysqli_fetch_array($result, MYSQL_ASSOC);

  if ($status == 'accepted') {
    $teamid = $application['teamid'];
    $eventid = $application['eventid'];
    $number = $application['number'];

    $query = "INSERT INTO `event-participants` VALUES (NULL, '$teamid', '$eventid', '$number')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $query = "DELETE FROM `event-application` WHERE id = '$appid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }



    // $message = "Ваша заявка на участие в соревновании подтверждена!\n";
  	// $message = wordwrap($message, 70);
  	// mail($email, 'FSR application', $message);
  }
  header('Location: ../admin/admin.php');

?>
