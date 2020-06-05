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
        Accept/ Decline
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
      while ($application = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
        
        <tr class="">
          <td rowspan="11" class=""><?php echo $application['firstname'] . " " . $application['lastname']; ?></td>
          <td class=""><b>Company:</b> <?php echo $application['company'] ?></td>
          <td rowspan="11" class=""><?php echo $application['status'] ?></td>
          <td rowspan="11" class="">Accept Decline</td>
        </tr>
        <tr class="">
          <td class=""><b>Division:</b> <?php echo $application['division'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Main tasks:</b> <?php echo $application['tasks'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Languages:</b> <?php echo $application['languages'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Participation days:</b> <?php echo $application['part-days'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Accomodation:</b> <?php echo $application['accomodation'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Discipline:</b> <?php echo $application['discipline'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Position:</b> <?php echo $application['position'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Judging queue:</b> <?php echo $application['queue'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Judging group:</b> <?php echo $application['group'] ?></td>
        </tr>
        <tr class="">
          <td class=""><b>Special field:</b> <?php echo $application['spec'] ?></td>
        </tr>
        
        <?php
      }
    ?>
    
    
  </tbody>
</table>
