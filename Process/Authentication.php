<?php
include_once __DIR__ . '/../Classes/Dbh.class.php';
include __DIR__ . '/../Classes/UsersCntrl.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signinBtn'])) {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $message = "";

    $usersCntrl = new UsersCntrl();


    if ($usersCntrl->Login($username, $password, $message)) {
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['message_log'] = $message;
        header("Location: ../sign_in.php");
        exit();
    }

} else {
    echo "Invalid request method.";
}