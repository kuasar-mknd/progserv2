<?php

require_once('../config/autoload.php');

use ch\comem\DbManager2;

$error_msg = "";

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$is_superUser = filter_input(INPUT_POST, 'is_superUser', FILTER_SANITIZE_STRING);

// If is_superUser is not set return error
if (empty($is_superUser)) {
    $error_msg .= '<div class="alert alert-danger">
        Il faut un rôle.
    </div>';
}
else {

    $db = new DbManager2();

    /* Check if the username exist */
    if ($db->emailExist($username)) {

        // If user exist, then check if exist in superUser table
        if ($db->getSuperUser($username)) {
            $error_msg = "L'utilisateur est déjà super utilisateur";
        } else {

            // If user exist but not in superUser table, then add it
            $db->createSuperUser($username, $is_superUser);
            $error_msg = "L'utilisateur est maintenant super utilisateur";
        }
    }
}

