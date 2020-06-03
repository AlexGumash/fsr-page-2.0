<?php
session_start();
include '../../database/connection.php';
// $query = "SELECT * FROM `event-docs` JOIN `event-docs-approval` ON `event-docs`.id = `event-docs-approval`.`event-docs-id` WHERE `bom-status` = 2";
// $result = mysqli_query($date, $query);

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
    <tr class="">
      <td class="">Вася бабабабабабабабабабабаба</td>
      <td class="">not accepted</td>
      <td class="">Accept</td>
    </tr>
  </tbody>
</table>