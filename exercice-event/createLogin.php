<?php
/**
 * Create new account
 */
require_once 'autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);

    if ($password == $passwordConfirm) {
        $db = new ch\comem\databaseMember();
        $member = $db->selectOneMemberByEmail($email);
        if ($member) {
            $error = 'Cet email est déjà utilisé';
            require_once 'ch/comem/views/v-createLogin.php';
        }
        else {
            $db->insertMember($name, $firstname, $email, $password);
            header('Location: index.php');
            exit;
        }
    }
    else {
        $error = 'Les mots de passe ne correspondent pas';
        require_once 'ch/comem/views/v-createLogin.php';
    }
}
else {
    require_once 'ch/comem/views/v-createLogin.php';
}

