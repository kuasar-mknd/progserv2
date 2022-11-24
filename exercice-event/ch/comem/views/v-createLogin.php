<?php
/**
 * View for the creation of a login
 */
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Création d'un compte</title>
    </head>
    <body>
        <h1>Création d'un compte</h1>
        <form action="createLogin.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Créer le compte">
        </form>
    </body>
</html>

