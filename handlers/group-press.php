<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['press-request'])) {

    $userid = $_SESSION['id'];
    $company = $_REQUEST['company'];

    $query = "INSERT INTO `user-press-info` VALUES (NULL, '$company', '$userid', 'not confirmed')";
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
