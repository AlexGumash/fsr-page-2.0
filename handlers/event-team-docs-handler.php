<?
  session_start();
  include '../database/connection.php';
  $teamid = $_REQUEST['teamid'];
  $discipline = $_REQUEST['discipline'];
  $status = $_REQUEST['status'];

  if ($discipline == 'iad') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `iad-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($discipline == 'se3d') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `se3d-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($discipline == 'ses') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `ses-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($discipline == 'sesa') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `sesa-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($discipline == 'esf') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `esf-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  if ($discipline == 'bppv') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `bppv-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

  }

  if ($discipline == 'bom') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `bom-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }
  
  if ($discipline == 'ef') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `ef-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }
  
  if ($discipline == 'smf') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `smf-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }
  
  if ($discipline == 'dss') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `dss-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }
  
  if ($discipline == 'edr') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `edr-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }
  
  if ($discipline == 'mu') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `mu-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }
  
  if ($discipline == 'esoq') {
    if ($status == 'accepted') {
      $status = 1;
    } else {
      $status = 3;
    }
    $query = "UPDATE `event-docs-approval` SET `esoq-status` = '$status' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }


?>
