<?php
  session_start();
  include '../database/connection.php';
  if(isset($_GET['token']) && !empty($_GET['token'])){
    $token = $_GET['token'];
    $userid = $_GET['userid'];
  }else{
    die("No virifing code!");
  }
  $query = "SELECT * FROM `confirm-users` WHERE userid = '$userid'";
  $result = mysqli_query($date, $query);
  $confirm_user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $confirm_id = $confirm_user['id'];
  if ($token == $confirm_user['token']) {
    $query = "UPDATE users SET `email-status` = 1 WHERE id = '$userid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    } else {
      $query = "DELETE FROM `confirm-users` WHERE id = '$confirm_id'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error($date));
      }
    }
  }

  $email = $confirm_user['email'];
  $subject = "Formula Student Russia Website Registration";
  $message = 'Your account has been just activated.';
  $headers = "Content-type: text/html";
  mail($email, $subject, $message, $headers);

  unset($_SESSION['email-conf']);
  header('Location: ../index.php');
?>
