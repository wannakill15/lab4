<?php
session_start();

if (!isset($_SESSION['auth'])) {
    $_SESSION['status'] = "You must login to access the dashboard";
    header("Location: loginform.php");
    exit(0);
}
?>