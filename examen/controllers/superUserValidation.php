<?php

/* Edit to match to real config */
require_once('./config/autoload.php');
use ch\comem\DbManager;
/*--------------------------------*/


$error_msg = "";

/* Check if the form has been submitted and filter the values */
if (isset($_POST['addSuperUser'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $is_superUser = filter_input(INPUT_POST, 'is_superUser', FILTER_SANITIZE_STRING);

    /* Check if the username is not empty */
    if (empty($username)) {
        $error_msg .= '<p class="error">Le nom d\'utilisateur est vide.</p>';
    } else {
        /* Check if the username is not empty */
        if (empty($is_superUser)) {
            $error_msg .= '<p class="error">Le statut de super utilisateur est vide.</p>';
        } else {

            
            $db = new DbManager();

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
    }
}



