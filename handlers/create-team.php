<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['create-team-submit'])) {
    $login = $_SESSION['login'];
    $query = "SELECT * FROM users WHERE login = '$login'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQL_ASSOC);
    $userid = $user['id'];

    $captain = $user['id'];
    $uni = $_REQUEST['uni'];
    $name = $_REQUEST['name'];
    $homepage = $_REQUEST['homepage'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $country = $_REQUEST['country'];
    $address = $_REQUEST['address'];
    $class = $_REQUEST['class'];

    $query = "INSERT INTO teams VALUES (NULL, '$captain', '$uni', '$name', '$homepage', '$email', '$phone', '$country', '$address', '$class', '')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $query = "SELECT * FROM teams WHERE name = '$name'";
    $result = mysqli_query($date, $query);
    $team = mysqli_fetch_array($result, MYSQL_ASSOC);
    $teamid = $team['id'];

    $query = "INSERT INTO `team-media` VALUES (NULL, '$teamid', '', '', '', '')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    if ($class == 'CV') {
      $group = 'FSC team member';
    } else {
      $group = 'FSE team member';
    }
    $query = "UPDATE users SET teamid = '$teamid', `group` = '$group' WHERE id = '$userid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "INSERT INTO `user-team-info` VALUES (NULL, '$userid', '$uni', '', '', '', '', 'captain')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    header('Location: ../pages/myteam.php');
  }

?>