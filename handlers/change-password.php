<?php
  session_start();
  include '../database/connection.php';
  // echo $id;
  $id = $_SESSION['id'];
  $query = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $currentPassword = $user['password'];

  $oldPassword = $_REQUEST['old-password'];
  $newPassword = $_REQUEST['new-password'];
  $oldPassword = hash("md5", $oldPassword);
  $newPassword = hash("md5", $newPassword);

  if ($currentPassword != $oldPassword) {
    die("Entered old password is not correct");
  } else {
    $query = "UPDATE users SET `password` = '$newPassword' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  header('Location: ../pages/account.php');
?>
