<?php
include_once __DIR__ . '/../Classes/Dbh.class.php';
include __DIR__ . '/../Classes/MessagesCntrl.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signupBtn'])) {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $passwordRep = $_POST['passwordRep'] ?? '';
    $message = "";

    $messagesCntrl = new MessagesCntrl($userid, $botmessage, $usermessage);

    if ($messagesCntrl->RecordMessages()) {
        $redirect = "../sign_in.php";
        $message  = "Message recorded successfully! Redirecting…";
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