<?php
  session_start();
  include '../database/connection.php';

  $email = $_REQUEST['emailToCheck'];

  $query = "SELECT email FROM users WHERE email = '$email'";
  $result = mysqli_query($date, $query);
  if (mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    die("This email is already used");
  }
?>
