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
        header("Location: ../sign_in.php");
        exit();
    } else {
        $_SESSION['message_log'] = $message;
        header("Location: ../sign_up.php");
        exit();
    }

} else {
    echo "Invalid request method.";
}