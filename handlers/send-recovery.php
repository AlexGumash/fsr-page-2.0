<?
  session_start();
  include '../database/connection.php';
  echo $_SESSION['login'];
  if (!$_SESSION['login']) {
    $email = $_REQUEST['email'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (!$user) {
      die("No user with this email");
    }

    if ($user['email-status'] == 0) {
      die("This email is not activated");
    }

    $query = "SELECT * FROM `recovery-users` WHERE email = '$email'";
    $result = mysqli_query($date, $query);
    if (mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      die("Recovery link was already sent to the specified email");
    }

    $token = md5($email.time());

    $userid = $user['id'];
    $query = "INSERT INTO `recovery-users` VALUES (NULL, '$userid', '$token', '$email')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $subject = "Formula Student Russia Website Password Recovery";
    $message = 'Please follow this link to set the new password<br/><a href=http://fsr/pages/password-recovery.php?token='.$token.'&userid='.$userid.'>Set new password</a><br/>';
    $headers = "Content-type: text/html";
    mail($email, $subject, $message, $headers);

    $_SESSION['password-recovery'] = "success";
  } else {
    die("Something went wrong!");
  }

?>
