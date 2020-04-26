<?php
  session_start();
  date_default_timezone_set('Europe/Moscow');
  include '../database/connection.php';
  $userid = $_SESSION['id'];
  $doc = $_REQUEST['doc'];

  $query = "SELECT * FROM users WHERE id = '$userid'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];

  $query = "SELECT * FROM `event-participants` WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  $participant = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if (isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];

    $date2 = date('j')."-".date('m')."-".date('Y')."_".date('h').".".date('i');

    $new_file_name = "FSR2020_" . $participant['number'] . "_" . $doc . "_" . $date2 . ".pdf";

    move_uploaded_file($_FILES['file']['tmp_name'], '../deadline-files/' . $new_file_name);

    if ($doc == 'IAD') {
      $query = "UPDATE `event-docs` SET iad = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `iad-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die(mysqli_error());
      }
    }
    if ($doc == 'SE3D') {
      $query = "UPDATE `event-docs` SET se3d = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `se3d-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'SES') {
      $query = "UPDATE `event-docs` SET ses = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `ses-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'SESA') {
      $query = "UPDATE `event-docs` SET sesa = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `sesa-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'ESF') {
      $query = "UPDATE `event-docs` SET esf = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `esf-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'BPPV') {
      $query = "UPDATE `event-docs` SET bppv = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `bppv-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'CRD') {
      $query = "UPDATE `event-docs` SET crd = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `crd-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'DSS') {
      $query = "UPDATE `event-docs` SET dss = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `dss-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'EDR') {
      $query = "UPDATE `event-docs` SET edr = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `edr-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'MU') {
      $query = "UPDATE `event-docs` SET mu = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `mu-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
    if ($doc == 'ESOQ') {
      $query = "UPDATE `event-docs` SET esoq = '$new_file_name' WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later.");
      }
      $query = "UPDATE `event-docs-approval` SET `esoq-status` = 2 WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      if (!$result) {
        die("Error. Try again later");
      }
    }
  } else {
    echo "Please, select file to upload";
  }


?>
