<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['press-request'])) {
    
    $userid = $_SESSION['id'];
    $company = $_REQUEST['company'];

    $query = "INSERT INTO `user-press-info` VALUES (NULL, '$userid', 'not confirmed', '$company')";
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