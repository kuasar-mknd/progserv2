<?php

use ch\comem\DbManager;

    @session_start();
    //check if user is logged
    if(!isset($_SESSION["is_logged"])) {
        header("Location: ./login.php");
    }
    else{
        //check if user is a superUser
        if(!isset($_SESSION["superUser"])) {
            //check in database if user is a superUser with the session user_id
            $dbManager = new DbManager();
            if(!$dbManager->getStatus($_SESSION["user_id"])){
                header("Location: ./login.php");
            }
            else
            {
                $_SESSION["superUser"] = true;
            }
        }
        //if user is not superUser
        elseif (!$_SESSION["superUser"]) {
            header("Location: ./login.php");
        }
    }
?>