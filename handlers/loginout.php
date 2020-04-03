<?php include '../database/connection.php' ?>
<?php
session_start();

if (isset($_REQUEST['login-submit'])) {

  $login = $_REQUEST['login'];
  $password = hash("md5", $_REQUEST['password']);
  $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if (!$user) {
    die("Wrong login or password!");
  }

  $id = $user['id'];
  if ($user['email-status'] != 0) {
    $_SESSION['login'] = $login;
    $_SESSION['id'] = $id;
    $_SESSION['rights'] = $user['group'];
  } else {
    die("Please verify your email");
  }
  // $_SESSION['rights'] = $user['rights'];
  header('Location: ../index.php');
}

if (isset($_REQUEST['logout'])) {
  $_SESSION['login'] = '';
  $_SESSION['id'] = '';
  // $_SESSION['rights'] = '';

  unset($_SESSION['login']);
  unset($_SESSION['id']);
  // unset($_SESSION['rights']);

  header('Location: ../index.php');
}

?>
