<?php
session_start();
include '../../database/connection.php';
$query = "SELECT * FROM `user-volunteer-info` JOIN users ON `user-volunteer-info`.userid = users.id";
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
        Accept/ Decline
      </th>
    </tr>
  </thead>
  <tbody>
  <?php
    while ($application = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      ?>
        <tr class="">
          <td rowspan="5" class=""><?php echo $application['firstname'] . " " . $application['lastname']; ?></td>
          <td class=""><b>Description:</b><?php echo $application['description'] ?></td>
          <td rowspan="5" class=""><?php echo $application['status'] ?></td>
          <td rowspan="5" class="">Accept</td>
        </tr>
        <tr class="">
          <td class=""><b>Company:</b><?php echo $application['company'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Languages:</b><?php echo $application['languages'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Participation days:</b><?php echo $application['part-days'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Skills:</b><br><?php
            if ($application['fire-extinguishing'] == 'on') {
              echo('Experience in the use of fire extinguishing agentss,');
            } ?><?php
            if ($application['first-aid'] == 'on') {
              echo('The ability to provide first aid,');
            } ?><?php
            if ($application['DL'] == 'on') {
              echo(`Driver's license,`);
            } ?><?php
            if ($application['ms-office'] == 'on') {
              echo(`Strong ms Ofice skills,`);
            } ?><?php
            if ($application['photo-skill'] == 'on') {
              echo(`Photography and photo editing skills,`);
            } ?><?php
            if ($application['video-skill'] == 'on') {
              echo(`Video editing skills`);
            } ?>
          </td>
        </tr>
      <?php
    }
  ?>
  </tbody>
</table>
