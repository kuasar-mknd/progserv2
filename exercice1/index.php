<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1</title>
</head>
<body>
<form action="index.php" method="post">
    <label for="special">Nombre de caractères spéciaux ()[]{}$€_</label>
    <input type="number" name="special" id="special" min="1" max="20" value="8">
    <br>
    <label for="number">Nombre de chiffres</label>
    <input type="number" name="number" id="number" min="1" max="20" value="8">
    <br>
    <label for="letterMin">Nombre de lettres minuscule</label>
    <input type="number" name="letterMin" id="letterMin" min="1" max="20" value="8">
    <br>
    <label for="letterMaj">Nombre de lettres majuscule</label>
    <input type="number" name="letterMaj" id="letterMaj" min="1" max="20" value="8">
    <br>
    <input type="submit" value="Générer">
</form>
</body>
</html>

<?php
require_once 'PasswordGen.php';
$passwordGen = new passwordGen();

if (isset($_POST['special']) && isset($_POST['number']) && isset($_POST['letterMin']) && isset($_POST['letterMaj'])) {
    $special = filter_var($_POST['special'], FILTER_VALIDATE_INT);
    $number = filter_var($_POST['number'], FILTER_VALIDATE_INT);
    $letterMin = filter_var($_POST['letterMin'], FILTER_VALIDATE_INT);
    $letterMaj = filter_var($_POST['letterMaj'], FILTER_VALIDATE_INT);
    if ($special && $number && $letterMin && $letterMaj) {
        $password = $passwordGen->generatePassword($special, $number, $letterMin, $letterMaj);
        if ($password) {
            echo $password;
        } else {
            echo 'Mot de passe déjà utilisé';
        }
    } else {
        echo 'Veuillez entrer des nombres';
    }
}