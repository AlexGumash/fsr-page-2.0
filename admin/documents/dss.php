<?php
session_start();
include '../../database/connection.php';
$query = "SELECT * FROM `event-docs` JOIN `event-docs-approval` ON `event-docs`.id = `event-docs-approval`.`event-docs-id` WHERE `dss-status` != 0";
$result = mysqli_query($date, $query);

function getStatus($status) {
  if ($status == 0) {
    return 'Not uploaded';
  }
  if ($status == 1) {
    return 'Approved';
  }
  if ($status == 2) {
    return 'On review';
  }
  if ($status == 3) {
    return 'Failed';
  }
}
?>
<?php
  if ($_SESSION['rights'] != 'admin') {
    die("Log in as admin!");
  }
?>
<div class="docs-list">
  <div class="docs-list-header">
    <div class="docs-list-1">
      <span>Team name</span>
    </div>
    <div class="docs-list-2">
      <span>Document</span>
    </div>
    <div class="docs-list-3">
      <span>Status</span>
    </div>
    <div class="docs-list-4">
      <span>Accept/Decline</span>
    </div>
  </div>
  <?php
  $i = 1;
  while ($doc = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $teamid = $doc['teamid'];
    $query = "SELECT * FROM teams WHERE id = '$teamid'";
    $result2 = mysqli_query($date, $query);
    $team = mysqli_fetch_array($result2, MYSQLI_ASSOC);

    ?>
    <div class="doc" id="doc<?php echo $i ?>">
      <div class="docs-list-1">
        <span><?php echo $team['name']; ?></span>
      </div>
      <div class="docs-list-2">
        <span>
          <a href="../../deadline-files/<?php echo $doc['dss']; ?>"><?php echo $doc['dss']; ?></a>
        </span>
      </div>
      <div class="docs-list-3" id="docstatus<?php echo $i ?>">
        <span><?php echo getStatus($doc['dss-status']); ?></span>
      </div>
      <div class="docs-list-4">
        <div onclick="acceptDicline(<?php echo $i?>, 'dss', 'accepted', <?php echo $doc['teamid']?>);">
          <span>Accept</span>
        </div>
        <div onclick="acceptDicline(<?php echo $i?>, 'dss', 'declined', <?php echo $doc['teamid']?>);">
          <span>Decline</span>
        </div>
      </div>
    </div>
    <?php
    $i = $i + 1;
  }
  ?>
</div>
