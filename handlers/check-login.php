<?php
  session_start();
  include '../database/connection.php';

  $login = $_REQUEST['loginToCheck'];

  $query = "SELECT login FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  if (mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    die("This login is already used");
  }
?>
