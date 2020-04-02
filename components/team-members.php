<?php include '../database/connection.php' ?>
<?php
  session_start();
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $teamid = $user['teamid'];

  // $id = $_SESSION['id'];
  $query = "SELECT * FROM users WHERE teamid = '$teamid'";
  $result = mysqli_query($date, $query);
  // $team = mysqli_fetch_array($result, MYSQL_ASSOC);
?>

<div class="list-header">
  <div class="">
    <span>Name</span>
  </div>
  <div class="">
    <span>Contact</span>
  </div>
  <!-- <div class="">
    <span>Role</span>
  </div> -->
</div>

<div class="members-list">
  <?php
    while ($member = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      ?>
        <div class="member">
          <div class="name-container">
            <div class="firstname">
              <span><?php echo $member['firstname']; ?></span>
            </div>
            <div class="surname">
              <span><?php echo $member['lastname']; ?></span>
            </div>
          </div>
          <div class="email">
            <span><?php echo $member['email']; ?></span>
          </div>
        </div>
      <?php
    }
  ?>
</div>
