<?php
include_once __DIR__ . '/../Classes/Dbh.class.php';
include __DIR__ . '/../Classes/UsersCntrl.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signupBtn'])) {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $passwordRep = $_POST['passwordRep'] ?? '';
    $message = "";

    $usersCntrl = new UsersCntrl($username, $password, $passwordRep);

    if ($usersCntrl->Register($message)) {
        $redirect = "../sign_in.php";
        $message  = "Registration successful! Redirecting…";
        $delay    = 1500;
        include_once __DIR__ . "/../Includes/loading.php";
        exit();
    } else {
        $_SESSION['message_log'] = $message;
        $redirect = "../sign_up.php";
        $message  = "Registration failed. Please try again.";
        $delay    = 1500;
        include_once __DIR__ . "/../Includes/loading.php";
        exit();
    }

} else {
    echo "Invalid request method.";
}