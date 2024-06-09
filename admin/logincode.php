<?php
session_start();

// include file for database connection
include ('config/dbcon.php');

// check if the both username are set in the POST
if (isset($_POST['login_btn'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // sanitize both username and password from POST request
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

        $sql = "SELECT * FROM user_profile WHERE Email='$email' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                if ($row['Status'] == 'Not Verified'){
                    $_SESSION['status'] = "Please Verified your Account";
                    header("Location: loginform.php");
                    exit();
                }
                foreach($result as $row){
                    $user_id = $row['user_id'];
                    $email = $row['Email'];
                    $create = $row['Create_at'];
                }

                $_SESSION['auth'] = true;
                $_SESSION['auth_user'] = [
                    'user_id' => $user_id,
                    'Email' => $email,
                    'Create_at' => $create
                ];

                $_SESSION['status'] = "Logged in Successfully";
                header("Location: index.php");
                exit(); // Ensure no further code execution after redirection
    }
    else
    {
        $_SESSION['status'] = "Invalid email or password";
        header("Location: loginform.php");
        exit(); // Ensure no further code execution after redirection
    }
}
else
{
    $_SESSION['status'] = "Access Denied.!";
    header("Location: loginform.php");
    exit(); // Ensure no further code execution after redirection
}
?>