<?php     
    @session_start();
    $location = $_SESSION['originPage'] ?? "";
    session_destroy();
    header("Location: " . $location);
?>