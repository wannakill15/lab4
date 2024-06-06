<?php
include("includes/authentication.php");
include('config/dbcon.php');
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    <!-- /.content-header -->

        <div class="container">
            <div class="row row-cols-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><strong>Username</strong></h4>
                            <h6>
                                <?php
                                    if(isset($_SESSION['auth']))
                                    {
                                        echo $_SESSION['auth_user']['Email'];
                                    }
                                ?>
                            </h6>
                            <div class="image"> 
                                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="UserImage">
                            </div>
                            <button class="btn btn-primary mt-3">Upload New Photo</button>  
                            <p class="mt-2"><strong>Member Since:</strong>                               
                                <?php
                                    if(isset($_SESSION['auth']))
                                    {
                                        echo $_SESSION['auth_user']['Create_at'];
                                    }
                                ?> 
                            </p>                      
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <p><strong>Name:</strong>
                                        <?php
                                            if(isset($_SESSION['auth']))
                                            {
                                                echo $_SESSION['auth_user']['fullname'];
                                            }
                                        ?> 
                                </p>
                            </div>
                            <div class="form-group">
                                <p><strong>Address:</strong>
                                        <?php
                                            if(isset($_SESSION['auth']))
                                            {
                                                echo $_SESSION['auth_user']['address'];
                                            }
                                        ?> 
                                </p>
                            </div>
                            <div class="form-group">
                                <p><strong>Phone:</strong>
                                        <?php
                                            if(isset($_SESSION['auth']))
                                            {
                                                echo $_SESSION['auth_user']['phone'];
                                            }
                                        ?> 
                                </p>
                            </div>
                            <div class="form-group">
                                <p><strong>Email:</strong>
                                        <?php
                                            if(isset($_SESSION['auth']))
                                            {
                                                echo $_SESSION['auth_user']['Email'];
                                            }
                                        ?> 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <strong>Edit Profile</strong>
                        </div>
                        <div class="card-body">
                            <form action="update_profile.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" name="fullName" id="fullName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="profilePicture">Profile Picture</label>
                                    <input type="file" name="profilePicture" id="profilePicture" class="form-control-file" accept="image/*" max-size="1048576">
                                </div>
                                <button type="submit" name="editProfile" class="btn btn-primary btn-block">Update Profile</button>
                            </form>
                        </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header text-center">
                                    <strong>Change Password</strong>
                                </div>
                                <div class="card-body">
                                    <form action="update_profile.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="old_password">Old Password</label>
                                            <input type="password" name="old_password" id="password" class="form-control" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" id="password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="">Confirm Password</label>
                                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                                    <span id="password_message" class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
include("includes/script.php");
?>