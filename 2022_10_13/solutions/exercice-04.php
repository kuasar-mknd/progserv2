<?php
session_start();

if (isset($_POST['contact'])) {
    $contact = $_POST['contact'];
    $_SESSION['contact'] = $contact;
} elseif (isset($_SESSION['contact'])) {
    $contact = $_SESSION['contact'];
} else {
    $contact['nom'] = "";
    $contact['prenom'] = "";
    $contact['rue'] = "";
    $contact['no'] = "";
    $contact['npa'] = "";
    $contact['localite'] = "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Exercice 4</title>
  </head>
<body>
  <h2>Saisie d'une adresse</h2>
  <form method="post" action="">
    <fieldset>
    <legend>Contact</legend>
    Nom : <input type="text" name="contact[nom]" value="<?php echo $contact['nom']?>">  <br>
    Prénom : <input type="text" name="contact[prenom]" value="<?php echo $contact['prenom']?>"><br>
    Rue : <input type="text" name="contact[rue]" value="<?php echo $contact['rue']?>"><br>
    No : <input type="text" name="contact[no]" value="<?php echo $contact['no']?>"><br>
    NPA : <input type="text" name="contact[npa]" value="<?php echo $contact['npa']?>"><br> 
    Localité : <input type="text" name="contact[localite]" value="<?php echo $contact['localite']?>"><br>

    <input type="submit" value="Envoyer" />&nbsp;&nbsp;
    </fieldset>
  </form>
</body>
</html>
