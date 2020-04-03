<?php
  session_start();
  include '../database/connection.php';
  // echo $id;
  if (isset($_REQUEST['recovery-submit'])) {

    $id = $_SESSION['rec-user-id'];
    $token = $_SESSION['rec-token'];
    $query = "SELECT * FROM `recovery-users` WHERE token = '$token'";
    $result = mysqli_query($date, $query);
    $recuser = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $recuserid = $recuser['id'];
    if (!$recuser) {
      die("tokens mismatch");
    }

    $newPassword = $_REQUEST['new-password'];
    $newPasswordCopy = $newPassword;
    $repPassword = $_REQUEST['rep-password'];

    if ($newPassword != $repPassword) {
      die("Password mismatch");
    }
    $newPassword = hash("md5", $newPassword);

    $query = "UPDATE users SET `password` = '$newPassword' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $query = "DELETE FROM `recovery-users` WHERE id = '$recuserid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $query = "SELECT * FROM `users` WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $subject = "Formula Student Russia Website Password Recovery";
    $message = 'New password was set to your account!<br/> Your login: '.$user['login'].'<br/>Your new password: '.$newPasswordCopy;
    $headers = "Content-type: text/html";
    mail($user['email'], $subject, $message, $headers);

    unset($_SESSION['rec-user-id']);
    unset($_SESSION['rec-token']);
    unset($_SESSION['password-recovery']);
    header('Location: ../index.php');
  } else {
    die("Something went wrong!");
  }
?>
