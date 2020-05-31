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
    $firstAid = $_REQUEST['first-aid'];
    $fireExtinguishing = $_REQUEST['fire-extinguishing'];
    $electricalSafetyAdmission = $_REQUEST['electrical-safety-admission'];
    
    $userid = $_SESSION['id'];

    $query = "INSERT INTO `user-judge-info` VALUES (NULL, '$userid', '$company', '$division', '$mainTasks', '$languages', '$days', '$accomodation', '$discipline', '$firstAid', '$fireExtinguishing', '$electricalSafetyAdmission', 'not confirmed')";
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