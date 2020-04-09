<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];

  // $id = $_SESSION['id'];
  $query = "SELECT * FROM users JOIN `user-team-info` ON `users`.id = `user-team-info`.userid WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  // $team = mysqli_fetch_array($result, MYSQL_ASSOC);
?>

<div class="list-header">
  <div class=" list-header-item">
    <span>Name</span>
  </div>
  <div class=" list-header-item">
    <span>Contact</span>
  </div>
  <div class="role-position list-header-item">
    <?php if ($user['position'] == 'Captain') {
      ?>
      <a href="../pages/manage-roles.php" class="edit-positions">Edit positions</a>
      <?php
    } ?>
    <span>Position</span>
  </div>
</div>

<div class="members-list">
  <?php
    while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      ?>
        <div class="member">
          <div class="name-container member-item">
            <div class="firstname">
              <span><?php echo $member['firstname']; ?></span>
            </div>
            <div class="surname">
              <span><?php echo $member['lastname']; ?></span>
            </div>
          </div>
          <div class="email member-item">
            <span><?php echo $member['email']; ?></span>
          </div>
          <div class="position member-item">
            <span><?php echo $member['position']; ?></span>
          </div>
        </div>
      <?php
    }
  ?>
</div>
