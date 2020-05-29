<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['guest-request'])) {
    
    $userid = $_SESSION['id'];

    $query = "INSERT INTO `user-guest-info` VALUES (NULL, '$userid', 'not confirmed')";
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