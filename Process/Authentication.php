<?php
include_once __DIR__ . '/../Classes/Dbh.class.php';
include_once __DIR__ . '/../Classes/UsersCntrl.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signinBtn'])) {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $message = "";

    $usersCntrl = new UsersCntrl();


    if ($usersCntrl->Login($username, $password, $message)) {
        $redirect = "../index.php";
        $message  = "Login successful! Redirecting…";
        $delay    = 1500;
        include_once __DIR__ . "/../Includes/loading.php";
        exit();
    } else {
        $_SESSION['message_log'] = $message;
        $redirect = "../sign_in.php";
        $message  = "Redirecting…";
        $delay    = 1500;
        include_once __DIR__ . "/../Includes/loading.php";
        exit();
    }

} else {
    echo "Invalid request method.";
}