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
    // $message = "Вы зарегистрированы!";
  	// $message = wordwrap($message, 70);
  	// mail($email, 'FSR registration', $message);


    header('Location: ../pages/account.php');
  }

?>
