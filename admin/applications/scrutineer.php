<?php
session_start();
include '../../database/connection.php';
$query = "SELECT * FROM `user-scrutineer-info` JOIN users ON `user-scrutineer-info`.userid = users.id";
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
          <td rowspan="6" class=""> <?php echo $application['firstname'] . " " . $application['lastname']; ?></td>
          <td class="app-information">
            <b>Description:</b> <?php echo $application['description'] ?>
            <span><b>Company:</b> <?php echo $application['company'] ?></span>
            <span><b>Languages:</b> <?php echo $application['languages'] ?></span>
            <span><b>Participation days:</b> <?php echo $application['part-days'] ?></span>
            <span><b>Scruti's spec:</b> <?php echo $application['spec'] ?></span>
            <span><b>Skills:</b><br>
              <?php
              $skills = '';
              if ($application['fire-extinguishing'] == 'on') {
                $skills .= 'Experience in the use of fire extinguishing agentss';
              }
              if ($application['first-aid'] == 'on') {
                if ($skills != '') {
                  $skills .= ', The ability to provide first aid';
                }
              }
              if ($application['electrical-safety-admission'] == 'on') {
                if ($skills != '') {
                  $skills .= ', The admission of electrical safety';
                }
              }
              echo $skills;
              ?></span>
          </td>
          <td rowspan="6" class=""> <?php echo $application['status'] ?></td>
          <td class="" rowspan="6">
            <div onclick="acceptDicline(<?php echo $i?>, 'scrutineer', 'accepted', <?php echo $application['userid']?>);">
              <span>Accept</span>
            </div>
            <div onclick="acceptDicline(<?php echo $i?>, 'scrutineer', 'declined', <?php echo $application['userid']?>);">
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
