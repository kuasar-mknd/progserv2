<?php
    @session_start();
    if(!isset($_SESSION["isAdmin"])) {
        header("Location: ./login.php");
    }
?>