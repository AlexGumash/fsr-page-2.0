<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['vol-request'])) {

    $company = $_REQUEST['company'];
    $description = $_REQUEST['description'];
    $languages = $_REQUEST['languages'];
    $days = $_REQUEST['days'];
    $firstAid = $_REQUEST['first-aid'];
    $DL = $_REQUEST['DL'];
    $msOffice = $_REQUEST['ms-office'];
    $photoSkill = $_REQUEST['photo-skill'];
    $videoSkill = $_REQUEST['video-skill'];
    $fireExtinguishing = $_REQUEST['fire-extinguishing'];
    
    $userid = $_SESSION['id'];

    $query = "INSERT INTO `user-volunteer-info` VALUES (NULL, '$userid', '$company', '$description','$languages', '$days', '$firstAid', '$fireExtinguishing', '$DL', '$msOffice', '$photoSkill', '$videoSkill', 'not confirmed')";
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