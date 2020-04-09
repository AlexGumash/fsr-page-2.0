<?php
session_start();
include '../../database/connection.php';

?>
<?php
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($date, $query);
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
$teamid = $user['teamid'];
// echo $id;
$query = "SELECT * FROM `user-team-info` WHERE userid = '$id'";
$result = mysqli_query($date, $query);
$userinfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<div class="manage-captain">
  <?php
    // echo $userinfo['position'];
    if ($userinfo['position'] != 'Captain') {
      ?>
      <span>Only team captain can manage team roles.</span>
      <?php
    } else {
  ?>
  <div class="">
    <span>Current team captain deputies:</span>
    <?php
      $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE role = 'Team captain deputy'";
      $result = mysqli_query($date, $query);
      while ($deputy = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
        <span><?php echo $deputy['login']; ?></span>
        <?php
      }
    ?>

  </div>
  <div class="">
    <span>Select the new team captain deputies:</span>
    <select class="" name="">
      <?php
      $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE teamid = '$teamid'";
      $result = mysqli_query($date, $query);
      while ($teammember = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if (($teammember['position'] != 'Team captain deputy') && ($teammember['position'] != 'Faculty advisor') && ($teammember['position'] != 'Captain')) {
          ?>
          <option value="<?php echo $teammember['id'] ?>"><?php echo $teammember['login'] ?></option>
          <?php
        }
      }
      ?>

    </select>
  </div>
<?php } ?>
</div>
