<?php
session_start();
include '../../database/connection.php';
$query = "SELECT * FROM `user-org-info` JOIN users ON `user-org-info`.userid = users.id";
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
      <th class="application-list-status">
        Status
      </th>
      <th class="application-list-accept">
        Accept/ Decline
      </th>
    </tr>
  </thead>
  <tbody>
  <?php
    while ($application = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      ?>
      <tr class="">
        <td class=""> <?php echo $application['firstname'] . " " . $application['lastname']; ?></td>
        <td class=""> <?php echo $application['status'] ?></td>
        <td class="">Accept</td>
      </tr>
      <?php
    }
  ?>
  </tbody>
</table>
