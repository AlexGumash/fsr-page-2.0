<?
  session_start();
  include '../database/connection.php';
  if (isset($_REQUEST['team-edit-submit'])) {

    $teamid = $_REQUEST['teamid'];

    $name = $_REQUEST['name'];
    $uni = $_REQUEST['uni'];
    $homepage = $_REQUEST['homepage'];
    $description = $_REQUEST['description'];
    $address = $_REQUEST['address'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $facebook = $_REQUEST['facebook'];
    $instagram = $_REQUEST['instagram'];
    $youtube = $_REQUEST['youtube'];
    $vk = $_REQUEST['vk'];

    $query = "UPDATE teams SET uni = '$uni', name = '$name', homepage = '$homepage', email = '$email', phone = '$phone', address = '$address', description = '$description' WHERE id = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "UPDATE `team-media` SET facebook = '$facebook', instagram = '$instagram', youtube = '$youtube', vk = '$vk' WHERE teamid = '$teamid'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    header('Location: ../pages/myteam.php');
  }

?>
