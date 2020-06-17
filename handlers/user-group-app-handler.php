<?
  session_start();
  include '../database/connection.php';
  $id = $_REQUEST['userid'];
  $group = $_REQUEST['group'];
  $status = $_REQUEST['status'];

  if ($group == 'judge') {
    if ($status == 'accepted') {
      $status = 'confirmed';
    } else {
      $status = 'not confirmed';
    }
    $query = "UPDATE `user-judge-info` SET `status` = '$status' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($group == 'marshal') {
    if ($status == 'accepted') {
      $status = 'confirmed';
    } else {
      $status = 'not confirmed';
    }
    $query = "UPDATE `user-marshal-info` SET `status` = '$status' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($group == 'scruti') {
    if ($status == 'accepted') {
      $status = 'confirmed';
    } else {
      $status = 'not confirmed';
    }
    $query = "UPDATE `user-scrutineer-info` SET `status` = '$status' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($group == 'press') {
    if ($status == 'accepted') {
      $status = 'confirmed';
    } else {
      $status = 'not confirmed';
    }
    $query = "UPDATE `user-press-info` SET `status` = '$status' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($group == 'volunteer') {
    if ($status == 'accepted') {
      $status = 'confirmed';
    } else {
      $status = 'not confirmed';
    }
    $query = "UPDATE `user-volunteer-info` SET `status` = '$status' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($group == 'org') {
    if ($status == 'accepted') {
      $status = 'confirmed';
    } else {
      $status = 'not confirmed';
    }
    $query = "UPDATE `user-org-info` SET `status` = '$status' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

  }

  if ($group == 'partner') {
    if ($status == 'accepted') {
      $status = 'confirmed';
    } else {
      $status = 'not confirmed';
    }
    $query = "UPDATE `user-partner-info` SET `status` = '$status' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }
  
  if ($group == 'guest') {
    if ($status == 'accepted') {
      $status = 'confirmed';
    } else {
      $status = 'not confirmed';
    }
    $query = "UPDATE `user-guest-info` SET `status` = '$status' WHERE userid = '$id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }


?>
