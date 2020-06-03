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
    <div class="admin-doc-menu-item" data_target_docs='applications/judge.php'>
      <span>Judges</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='applications/scrutineer.php'>
      <span>Scrutineers</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='applications/volunteer.php'>
      <span>Volunteers</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='applications/org.php'>
      <span>Organizators</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='applications/marshal.php'>
      <span>Marshals</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='applications/guest.php'>
      <span>Guests</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='applications/partner.php'>
      <span>Partners</span>
    </div>
    <div class="admin-doc-menu-item" data_target_docs='applications/press.php'>
      <span>Press</span>
    </div>
  </div>

  <div id="docs-content">


  </div>
</div>
