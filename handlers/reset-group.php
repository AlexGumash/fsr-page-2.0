<?
  session_start();
  include '../database/connection.php';
  $id = $_SESSION['id'];
  $query = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if ($user['group'] == 'Regular user') {
    die('Your user group is already Regular user');
  }

  if ($user['group'] == 'FSE team member' || $user['group'] == 'FSC team member') {
    $query = "UPDATE users SET `group` = 'Regular user', teamid = 0 WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM `user-team-info` WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
  }

  if ($user['group'] == 'Judge') {
    $query = "UPDATE users SET `group` = 'Regular user' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM `user-judge-info` WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
  }

  if ($user['group'] == 'Marshal') {
    $query = "UPDATE users SET `group` = 'Regular user' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM `user-marshal-info` WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
  }

  if ($user['group'] == 'Scruti') {
    $query = "UPDATE users SET `group` = 'Regular user' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM `user-scrutineer-info` WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
  }

  if ($user['group'] == 'Press') {
    $query = "UPDATE users SET `group` = 'Regular user' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM `user-press-info` WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
  }

  if ($user['group'] == 'Volunteer') {
    $query = "UPDATE users SET `group` = 'Regular user' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM `user-volunteer-info` WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
  }

  if ($user['group'] == 'Organizer') {
    $query = "UPDATE users SET `group` = 'Regular user' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM `user-org-info` WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
  }

  if ($user['group'] == 'Partner') {
    $query = "UPDATE users SET `group` = 'Regular user' WHERE id = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM `user-partner-info` WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }
  }

  header('Location: ../pages/account.php');

?>
