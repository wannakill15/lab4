<?php



if(isset($_POST['editProfile'])){

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['fullname']);
    $phone = validate($_POST['phone']);
    $address = validate($_POST['address']);



    $query = "UPDATE user_profile SET fullname = '$name', phone_number= '$phone', address = '$address', password = '$password' WHERE user_id = '$user_id' ";
    $run_query = mysqli_query($conn, $query);

        if ($run_query){
            $_SESSION["status"] = "User Updated";
            header("Location: profile_info.php");
            exit();
        }else{
            $_SESSION["status"] = "Failed User Update";
            header("Location: profile_info.php");
            exit();
        }
    }

if(isset($_POST['editProfile'])){
    
    $password = validate($_POST['password']);
    $confirmpassword = validate($_POST['confirmPassword']);

    if($password == $confirmpassword){

    }else{
        $_SESSION['status'] = "Password not Match!";
        header("Location: profile_info.php");
        exit();
    }
}
?>