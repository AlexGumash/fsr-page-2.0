<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['judge-request'])) {

    $company = $_REQUEST['company'];
    $division = $_REQUEST['division'];
    $mainTasks = $_REQUEST['main-tasks'];
    $languages = $_REQUEST['languages'];
    $days = $_REQUEST['days'];
    $accomodation = $_REQUEST['accomodation'];
    $discipline = $_REQUEST['discipline'];
    $position = $_REQUEST['position'];
    $group = $_REQUEST['group'];
    $queue = $_REQUEST['queue'];
    $spec = $_REQUEST['spec'];

    $userid = $_SESSION['id'];

    $query = "INSERT INTO `user-judge-info` VALUES (NULL, '$userid', '$company', '$division', '$mainTasks', '$languages', '$days', '$accomodation', '$discipline', '$position', '$group', '$queue', '$spec', 'not confirmed')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
    $query = "SELECT * FROM users WHERE id = '$userid'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $email = $user['email'];
    $subject = "Formula Student Russia Website Applications";
    $message = 'Your application has been received. Wait for an answer.';
    $headers = "Content-type: text/html";
    mail($email, $subject, $message, $headers);


    header('Location: ../pages/account.php');
  }

?>
