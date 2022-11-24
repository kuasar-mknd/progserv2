<?php
/**
 * Login page view
 */

?>

<!-- Login page view -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <h1>Connexion</h1>
        <form action="login.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Se connecter">
        </form>
    </body>
</html>



