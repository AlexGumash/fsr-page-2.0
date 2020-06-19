<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['event-registration-submit'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $teamid = $_REQUEST['teamid'];
    $eventid = $_REQUEST['eventid'];
    $number = $_REQUEST['car-number'];

    $query = "INSERT INTO `event-application` VALUES (NULL, '$eventid', '$teamid', '$number')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
    $email = $user['email'];
    $subject = "Formula Student Russia Website Event Application";
    $message = 'Your events application has been received. Wait for an answer.';
    $headers = "Content-type: text/html";
    mail($email, $subject, $message, $headers);
    header('Location: ../pages/myteam.php');
  }

?>
