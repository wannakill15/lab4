<?php

include("config/dbcon.php");
include("includes/authentication.php");

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['profileupdate'])){

    $user_id = $_POST['user_id'];
    $profile_picture = $_FILES['file']['name'];
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $file_extension = pathinfo($profile_picture, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extension)) {
        $_SESSION['status'] = "You are allowed with only jpg, png, jpeg image";
        header('Location: profile_info.php');
        exit();
    }

    $update_sql = "UPDATE user_profile SET profileimg = ? WHERE user_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $profile_picture, $user_id);

    if ($stmt->execute()) {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$profile_picture);
        $_SESSION['status'] = "Profile Update Successfully";
        header('Location: profile_info.php');
        exit();
    } else {
        $_SESSION['status'] = ['message' => 'Profile Picture Updating Failed'];
        echo '<p>Error: ' . $_SESSION['status']['message'] . '</p>';
        exit();
    }
}
           
if(isset($_POST['editProfile'])) 
{
    $user_id = $_POST['user_id'];
    $fname = validate ($_POST['fullName']);
    $phone = validate ($_POST['phone']);
    $address = validate ($_POST['address']);

    if(empty($fname) || ($phone) || ($address)) {
        header("Location: profile_info.php");
        exit();
    }

    $query = "UPDATE user_profile SET fullname = '$fname', phone = '$phone', address = '$address' WHERE user_id = '$user_id'";
    $run_query = mysqli_query($conn, $query);

    if($run_query){
        $_SESSION['status'] = "Info Updated";
        header("Location: profile_info.php");
        exit();
    }else{
        $_SESSION['status'] = "Failed Info Update";
        header("Location: profile_info.php");
        exit();
                
    }
}

if(isset($_POST['birthday'])){
    $user_id = $_POST['user_id'];
    $birthday = validate ($_POST['birthday']);
    $birthdayvalid = new DateTime($birthday);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthdayvalid)->y;

    if(empty($birthday)){
        header("Location: profile_info.php");
        exit();
    }
        if ($age < 14) {
            $_SESSION['status'] = "Only 14 years old or above are allowed.";
            header("Location: profile_info.php?error=Only 14 years old or above are allowed.");
            exit();
        }else{
            $birthdateStr = $birthdayvalid->format('Y-m-d');
            $update_sql = "UPDATE user_profile SET birthday = ? WHERE user_id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("si", $birthdateStr, $user_id);

        if ($stmt->execute()) {
            $_SESSION['status'] = "Birthdate Update Successfully";
            header('Location: profile_info.php');
            exit(0);
        } else {
            $_SESSION['status'] = "Birthdate Update Failed";
            header("Location: profile_info.php");
            exit(0);
        }
    }
}

if(isset($_POST['updatePassword'])){
    $current_password = validate($_POST['current_password']);
    $new_password = validate($_POST['new_password']);
    $confirm_password = validate($_POST['confirm_password']);

    // Check if new password and confirm password match
    if ($new_password !== $confirm_password) {
        $_SESSION['status'] = "New password and confirm password do not match";
        header('Location: profile_info.php');
        exit(0);
    }

    // Update the password
    $update_sql = "UPDATE user_profile SET password = ? WHERE user_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $new_password, $user_id);

    if ($stmt->execute()) {
        $_SESSION['status'] = "Password Updated Successfully";
        header('Location: profile_info.php');
        exit(0);
    } else {
        $_SESSION['status'] = "Password Update Failed: " . $stmt->error;
        header("Location: profile_info.php");
        exit(0);
    }
}
?>