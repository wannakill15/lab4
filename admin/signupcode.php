<?php
session_start();
include('config/dbcon.php');

//php mailer from gethub
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// function to send an mail to your email you register
function sendemail_verify($email,$verify_token) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'ken.ae26@gmail.com';                     //SMTP username
    $mail->Password   = 'ulht wzbs bszj ebvt';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                  //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('ken.ae26@gmail.com', $email);
    $mail->addAddress($email);                              //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = "
    <h2>You have Registered</h4>
    <h5>Verify your Email with the link below</h5>
    <br/> <br/>
    <a href='http://localhost:3000/admin/verify_email.php?token=$verify_token'>Email Verification</a>" ; 

    $mail->send();
    echo'Verification Send';
    
}
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['signup_btn'])) {
    $email = validate ($_POST['email']);   
    $password = validate ($_POST['password']);
    $status = 'Not Verified';
    $verify_token = validate (md5(rand()));

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM user_profile WHERE Email='$email' LIMIT 1 ";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email already exists";
        header('Location: signupform.php');
        exit();
    } else {
        // Insert user data into the database
        $insert_query = "INSERT INTO user_profile (Email, password, Status, verify_token) VALUES ('$email', '$password', '$status', '$verify_token')";
        $insert_query_run = mysqli_query($conn, $insert_query);

        if($insert_query_run) {
            //send to the function to send an email to the $username and his/her $email
            sendemail_verify("$email","$verify_token");
            $_SESSION['status'] = "Account created successfully. Please login.";
            header('Location: loginform.php');
            exit();
        } else {
            $_SESSION['status'] = "Failed to create account. Please try again.";
            header('Location: signupform.php?status=error');
            exit();
        }
    }
} else {
    $_SESSION['status'] = "Access Denied";
    header('Location: signupform.php');
    exit();
}
?>
