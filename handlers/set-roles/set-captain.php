<?
  session_start();
  include '../../database/connection.php';
  if (isset($_REQUEST['captain-submit'])) {

    $newcaptainid = $_REQUEST['captain'];
    $currentcaptainid = $_SESSION['id'];

    $query = "UPDATE `user-team-info` SET captain = '' WHERE captain = 'Captain' AND userid = '$currentcaptainid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }

    $query = "UPDATE `user-team-info` SET captain = 'Captain' WHERE id = '$newcaptainid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      die(mysqli_error($date));
    }


    header('Location: ../../pages/manage-roles.php');
  }

?>
