<?php

include('config/dbcon.php');

$user_id = $_SESSION['auth_user']['user_id'];

$query = "SELECT profileimg FROM user_profile WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $profileimg = $_SESSION['auth_user']['profileimg'] = $row['profileimg'];
}

?>








<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          $profilePicture = isset($_SESSION['auth_user']['profileimg']) && $_SESSION['auth_user']['profileimg'] != "" ? $_SESSION['auth_user']['profileimg'] : 'uploads/avatar.png';
          ?>
          <img src="<?php echo 'uploads/' . $profileimg; ?>" class="brand-image img-circle elevation-3" style="opacity: .8; width: 40px; height: 40px;">
          </div>
        <div class="info">
          <a href="profile_info.php" class="d-block">
          <?php
              if(isset($_SESSION['auth']))
              {
                echo $_SESSION['auth_user']['Email'];
              }
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">Settings</li>
          <li class="nav-item">
            <a href="regisform.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Registered User
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>