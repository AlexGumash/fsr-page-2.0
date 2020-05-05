<div class="">
  <?php
    session_start();
    if ($_SESSION['rights'] != 'admin') {
      die("Log in as admin!");
    }
  ?>
  <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
  <script type="text/javascript" src='../scripts/ajax.js'></script>
  <div class="admin-menu">
    <div class="admin-doc-menu-item" data_target_docs='documents/iad.php'>
      <span>IAD</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/se3d.php'>
      <span>SE3D</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/ses.php'>
      <span>SES</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/sesa.php'>
      <span>SESA</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/esf.php'>
      <span>EAIR && ESF</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/esoq.php'>
      <span>ESOQ</span>
    </div>
  </div>

  <div id="docs-content">


  </div>
</div>
