  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            <?php
              if(isset($_SESSION['auth']))
              {
                echo $_SESSION['auth_user']['Email'];
              }else{
                echo "Not Logged in";
              }
            ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="editprofile.php">Edit Profile</a></li>
            <form action="code.php" method="post">
              <button type="submit" class="dropdown-item" name="logoutbtn">Logout</button>
            </form>
          </ul>
        </div>
      </li>
  </nav>
  <!-- /.navbar -->
