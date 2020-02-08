<?php include '../database/connection.php' ?>
<?php
session_start();

if (isset($_REQUEST['login-submit'])) {

  $login = $_REQUEST['login'];
  $password = hash('md5', $_REQUEST['password']);

  $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
  if (!$user) {
    die("Неправильный логин или пароль");
  }

  $id = $user['id'];
  $_SESSION['login'] = $login;
  $_SESSION['id'] = $id;
  $_SESSION['rights'] = $user['group'];
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
