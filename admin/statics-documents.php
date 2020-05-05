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
    <div class="admin-doc-menu-item" data_target_docs='documents/bppv.php'>
      <span>BPPV</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/bom.php'>
      <span>CRD - Bill of Material</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/ef.php'>
      <span>CRD - Explanation File</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/smf.php'>
      <span>CRD - Supporting Material File</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/dss.php'>
      <span>DSS</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='documents/edr.php'>
      <span>EDR</span>
    </div>
  </div>

  <div id="docs-content">


  </div>
</div>
