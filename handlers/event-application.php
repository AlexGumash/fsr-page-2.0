<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['event-registration-submit'])) {

    $teamid = $_REQUEST['teamid'];
    $eventid = $_REQUEST['eventid'];
    $number = $_REQUEST['car-number'];

    $query = "INSERT INTO `event-application` VALUES (NULL, '$eventid', '$teamid', '$number')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    header('Location: ../pages/team.php');
  }

?>
