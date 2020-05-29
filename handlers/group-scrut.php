<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['scrut-request'])) {

    $company = $_REQUEST['company'];
    $description = $_REQUEST['description'];
    $languages = $_REQUEST['languages'];
    $days = $_REQUEST['days'];
    $firstAid = $_REQUEST['first-aid'];
    $fireExtinguishing = $_REQUEST['fire-extinguishing'];
    $electricalSafetyAdmission = $_REQUEST['electrical-safety-admission'];
    $scrutineering = $_REQUEST['scrutineering'];
    
    $userid = $_SESSION['id'];

    $query = "INSERT INTO `user-scrutineer-info` VALUES (NULL, '$company', '$description','$languages', '$days', '$firstAid', '$fireExtinguishing', '$electricalSafetyAdmission', '$scrutineering', '$userid', 'not confirmed')";
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