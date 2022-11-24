<?php
/*
 * Dans cette version utilisant les sessions, les informations
 * sont stockées sur le serveur.
 */
session_cache_expire(15);
session_start();

// definition des utilisateurs valides
define('VALID_USERNAME', 'comem');
define('VALID_PASSWORD', md5('comem_2022_m50')); //Juste pour le connaître ;-)

// Gestion du logout
if (isset($_GET['logout'])) {
    setcookie("username");
    unset($_SESSION['username']);
    setcookie("password");
    unset($_SESSION['password']);
}

// Récupère le username/password à partir du formulaire ou des cookies (si existants)
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
} elseif (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
} else {
    $username = NULL;
    $password = NULL;
}

// Controle l'authentification et crée le cookie en cas de succès
if ($username == VALID_USERNAME && $password == VALID_PASSWORD) {
    $userIsValid = true;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
} else {
    $userIsValid = false;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Exercice 5</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
// Affichage du contenu protégé si l'utilisateur est valide
if ($userIsValid) {
?>

<p>
  Ceci est un contenu protégé !
  <br />
  <a href="?logout">Logout</a>
</p>

<?php
} else { // Affichage du contenu formulaire pour la connexion
?>

<p>
  Veuillez entrer un utilisateur et un mot de passe valide...
</p>

<form id="authentification" method="post" action="">
  <p>
    Username <input type="text" name="username" value="<?php print $username ?>" />
    <br />
    Password <input type="password" name="password" />
    <br />
    <input type="submit" name="Submit" value="Envoyer" />
  </p>
</form>

<?php
} // Fin de l'affichage du formulaire de login

?>

</body>
</html>
