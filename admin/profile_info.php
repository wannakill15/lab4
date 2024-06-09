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

    <?php
    include('message.php');
    ?>


        <div class="container">
            <div class="row row-cols-2">
                <div class="col-md-4">
                    <?php
                    $user_id = $_SESSION['auth_user']['user_id'];
                    $sql = "SELECT * FROM user_profile WHERE user_id = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $row){
                            $user_id = $row['user_id'];
                            $profileimg = $row['profileimg'];
                            $fullname = $row['fullname'];
                            $email = $row['Email'];
                            $phone = $row['phone'];
                            $birthday = $row['birthday'];
                            $address = $row['address'];
                            $create = $row['Create_at'];
                        }
                
                        $_SESSION['auth'] = true;
                        $_SESSION['auth_user'] = [
                            'user_id' => $user_id,
                            'profileimg' => $profileimg,
                            'fullname' => $fullname,
                            'Email' => $email,
                            'phone' => $phone,
                            'address' => $address,
                            'birthday' => $birthday,
                            'Create_at' => $create
                        ];
                    }
                
                    ?>
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="image"> 
                                <img src="<?php echo 'uploads/' . $profilePicture; ?>" class="img-circle elevation-3" style="opacity: .8; width: 200px; height: 200px;" alt="UserImage">
                            </div>
                            <form action="update_profile.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="user_id" name="user_id" class="form-control" value="<?php echo $_SESSION['auth_user']['user_id'] ?>" required>
                                <div class="form-group mt-3">
                                    <label for="profile">Profile Picture</label>
                                    <input type="file" id="file" name="file" required>
                                </div>
                                    <button type="submit" name="profileupdate" class="btn btn-info">Upload Profile</button>
                            </form>
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
                            <div class="form-group">
                                <p><strong>Birthday:</strong>
                                        <?php
                                            if(isset($_SESSION['auth']))
                                            {
                                                echo $_SESSION['auth_user']['birthday'];
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
                                <input type="hidden" id="user_id" name="user_id" class="form-control" value="<?php echo $_SESSION['auth_user']['user_id'] ?>" required>
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" name="fullName" id="fullName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" id="phone" name="phone" placeholder="+63 123 456 7890" class="form-control" pattern="(\+63)?\s?\d{3}\s?\d{3}\s?\d{4}">                                
                                </div>
                                <button type="submit" name="editProfile" class="btn btn-primary btn-block">Update Profile</button>
                            </form>
                        </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header text-center">
                                    <strong>Birthday</strong>
                                </div>
                                <div class="card-body">
                                    <form action="update_profile.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="user_id" name="user_id" class="form-control" value="<?php echo $_SESSION['auth_user']['user_id'] ?>" required>
                                    <div class="form-group">
                                        <label for="birthday">BirthDate</label>
                                        <input type="date" name="birthday" id="birthday" value="<?php echo $_SESSION['auth_user']['birthday'] ?>" class="form-control">
                                    </div>
                                    <button type="submit" name="birthday" class="btn btn-primary btn-block"> Update Birthday </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card">
                                <div class="card-header text-center">
                                    <strong>Update Password</strong>
                                </div>
                                <div class="card-body">
                                    <form action="update_profile.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" name="current_password" id="current_password" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="new_password">New Password</label>
                                                    <input type="password" name="new_password" id="new_password" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="confirm_password">Confirm Password</label>
                                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                                    <span id="password_message" class="text-danger"></span>
                                                </div>
                                            </div>
                                              <button type="submit" name="updatePassword" class="btn btn-primary btn-block">Update</button>
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