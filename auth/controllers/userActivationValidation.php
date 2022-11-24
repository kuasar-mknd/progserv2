<?php

require_once('./config/autoload.php');

use ch\comem\DbManager;

$activationMsg = "";

if (filter_has_var(INPUT_GET, 'token')) {
    $token = filter_input(INPUT_GET, 'token', FILTER_UNSAFE_RAW);
} else {
    $token = "";
}

if ($token) {
    $db = new DbManager();
    $row = $db->getTokenDatas($token);

    if ($row['token_ok']) {
        if (!$row['is_active']) {
            if ($db->activateAccount($token)) {
                $activationMsg = '<div class="alert alert-success">
                                  Votre compte a été validé !
                                </div>';
            }
        } else {
            $activationMsg = '<div class="alert alert-danger">
                               Votre compte a déjà été validé!
                            </div>';
        }
    } else {
        $activationMsg = "<div class='alert alert-danger'>
                               Ce jeton n'est pas valide!
                            </div>";
    }
} else {
    $activationMsg = "<div class='alert alert-danger'>
                    Problème d'activation du compte !
                </div>";
}
?>