<?php
session_start();
include '../../database/connection.php';
$query = "SELECT * FROM `user-judge-info` JOIN users ON `user-judge-info`.userid = users.id";
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
          <td rowspan="11" class=""><?php echo $application['firstname'] . " " . $application['lastname']; ?></td>
          <td class="app-information">
            <span><b>Company:</b> <?php echo $application['company'] ?></span>
            <span><b>Division:</b> <?php echo $application['division'] ?></span>
            <span><b>Main tasks:</b> <?php echo $application['tasks'] ?></span>
            <span><b>Languages:</b> <?php echo $application['languages'] ?></span>
            <span><b>Participation days:</b> <?php echo $application['part-days'] ?></span>
            <span><b>Accomodation:</b> <?php echo $application['accomodation'] ?></span>
            <span><b>Discipline:</b> <?php echo $application['discipline'] ?></span>
            <span><b>Position:</b> <?php echo $application['position'] ?></span>
            <span><b>Judging queue:</b> <?php echo $application['queue'] ?></span>
            <span><b>Judging group:</b> <?php echo $application['group'] ?></span>
            <span><b>Special field:</b> <?php echo $application['spec'] ?></span>
          </td>
          <td rowspan="11" class=""><?php echo $application['status'] ?></td>
          <td class="" rowspan="11">
            <div onclick="acceptDicline(<?php echo $i?>, 'judge', 'accepted', <?php echo $application['userid']?>);">
              <span>Accept</span>
            </div>
            <div onclick="acceptDicline(<?php echo $i?>, 'judge', 'declined', <?php echo $application['userid']?>);">
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
