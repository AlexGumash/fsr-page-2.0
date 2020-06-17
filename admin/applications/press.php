<?php
session_start();
include '../../database/connection.php';
$query = "SELECT * FROM `user-press-info` JOIN users ON `user-press-info`.userid = users.id";
$result = mysqli_query($date, $query);
?>
<?php
  if ($_SESSION['rights'] != 'admin') {
    die("Log in as admin!");
  }
?>
<table cellspacing="1" cellpadding="3" border="1" bordercolor="black" class="application-list">
  <thead class="application-list-header">
    <tr>
      <th class="application-list-name">
        Name
      </th>
      <th class="application-list-options">
        Information
      </th>
      <th class="application-list-status">
        Status
      </th>
      <th class="application-list-accept">
        Actions
      </th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i = 1;
    while ($application = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      if ($application['status'] == 'not confirmed') {
      ?>
        <tr class="" id="application<?php echo $i ?>">
          <td class=""> <?php echo $application['firstname'] . " " . $application['lastname']; ?></td>
          <td class=""><b>Company:</b> <?php echo $application['company'] ?></td>
          <td class=""> <?php echo $application['status'] ?></td>
          <td class="">
            <div onclick="acceptDicline(<?php echo $i?>, 'press', 'accepted', <?php echo $application['userid']?>);">
              <span>Accept</span>
            </div>
            <div onclick="acceptDicline(<?php echo $i?>, 'press', 'declined', <?php echo $application['userid']?>);">
              <span>Decline</span>
            </div>
          </td>
        </tr>
      <?php
    }
    $i = $i + 1;
    }
  ?>
  </tbody>
</table>
