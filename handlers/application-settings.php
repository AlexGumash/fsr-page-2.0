<?php
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['application-settings-submit'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $teamid = $user['teamid'];

    $phone = $_REQUEST['phone'];
    $fuelselect = $_REQUEST['fuelselect'];
    $eventparticipants = $_REQUEST['eventparticipants'];
    $eso = 0;

    $query = "UPDATE `event-participants` SET `fuel` = '$fuelselect', `contact-phone` = '$phone', `eso` = '$eso' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $query = "DELETE FROM `participants` WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    foreach ($eventparticipants as $participant) {
      $query = "INSERT INTO `participants` VALUES (NULL, '$participant', 1, '$teamid')";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }
    }

    header('Location: ../pages/application-settings.php');
  }

?>
