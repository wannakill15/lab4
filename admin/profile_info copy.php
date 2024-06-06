<?php
include("includes/authentication.php");
include('config/dbcon.php');
include("includes/header.php");
include("includes/topbar.php");
include("includes/sidebar.php");
?>

<div class="content-wrapper">
    <div class="container">
        <div class="row row-cols-2">
            <div class="col-md">1</div>
            <div class="col-md">2
            <div class="col-md">2</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-4">
                3
            </div>
        </div>
    </div>
</div>


    <!-- Content Wrapper. Contains page content -->
<!--     <div class="content-wrapper">
         Content Header (Page header) -->
<!--         <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div> /.col -->
           <!--  </div> --><!-- /.row -->
      <!--   </div>< --> 

    <!-- /.content-header -->

<!--         <div class="container">
            <div class="row row-cols-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><strong>Username</strong></h4>
                            <h6>

                            </h6>
                            <div class="image"> 
                                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="UserImage">
                            </div>
                            <button class="btn btn-primary mt-3">Upload New Photo</button>  
                            <p class="mt-2"><strong>Member Since:</strong>                               

                            </p>                      
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <p><strong>Name:</strong>

                                </p>
                            </div>
                            <div class="form-group">
                                <p><strong>Address:</strong>
                                </p>
                            </div>
                            <div class="form-group">
                                <p><strong>Phone:</strong>
                                </p>
                            </div>
                            <div class="form-group">
                                <p><strong>Email:</strong>
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
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong>edit</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3><strong>Change Password</strong></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<?php 
include("includes/script.php");
?>