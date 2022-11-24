<?php
//login page for members

require_once 'autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    login($email, $password);
}
else {
    require_once 'ch/comem/views/v-login.php';
}

function login(string $email, string $password)
{
    //hash password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db = new ch\comem\databaseMember();
    $member = $db->selectOneMemberByEmailAndPassword($email, $password);
    if ($member) {
        session_start();
        $_SESSION['member'] = $member;
        header('Location: index.php');
        exit;
    }
    else {
        $error = 'Mauvais email ou mot de passe';
        require_once 'ch/comem/views/v-login.php';
    }
}

function disconnect()
{
    session_destroy();
    header('Location: index.php');
    exit;
}


