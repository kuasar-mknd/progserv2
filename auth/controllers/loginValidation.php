<?php

use ch\comem\DbManager;

$error_msg = "";

if (filter_has_var(INPUT_POST, 'login')) {
    $password = filter_input(INPUT_POST, 'password_signin', FILTER_UNSAFE_RAW);
    $email = filter_input(INPUT_POST, 'email_signin', FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        $error_msg = "<div class='alert alert-danger email_alert'>
                            Il manque l'email.
                    </div>";
    } else if (empty($password)) {
        $error_msg = "<div class='alert alert-danger email_alert'>
                            Il manque le mot de passe.
                        </div>";
    } else if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $password)) {
        $error_msg = '<div class="alert alert-danger">
                        Le mot de passe doit avoir entre 8 et 20 caractères et contenir au moins : <br>- un caractère spécial,<br> - une minuscule,<br> - une majuscule,<br> - et un chiffre.
                    </div>';
    } else {
        $db = new DbManager();
        $row = $db->getUserDatas($email, $password);
        $email_ok = $row['email_ok'];
        if (!$email_ok) {
            $error_msg = "<div class='alert alert-danger'>
                        Ce compte utilisateur n'existe pas.
                    </div>";
        } else {
            $password_ok = $row['password_ok'];
            if ($password_ok) {
                $is_active = $row['is_active'];
                if ($is_active) {
                    $id = $row['id'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $mobilenumber = $row['mobilenumber'];
                    $_SESSION['is_logged'] = true;
                    $_SESSION['logged_user'] = [
                        'id' => $id,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'email' => $email,
                        'mobilenumber' => $mobilenumber,
                    ];
                    $location = $_SESSION['originPage'] ?? "";
                    header("Location: " . $location);
                } else {
                    $error_msg = "<div class='alert alert-danger'>
                            Il faut d'abord valider votre compte avant de vous logger.
                        </div>";
                }
            } else {
                $error_msg = "<div class='alert alert-danger'>
                                Le mot de passe est incorrect.
                            </div>";
            }
        }
    }
}
?>