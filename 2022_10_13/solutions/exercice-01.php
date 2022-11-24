<?php

$langue='Français';
if(isset($_POST['langue']))  {
    $langue=$_POST['langue'];
    $expir=time() + 2*30*24*3600;
    setcookie("langue",$langue,$expir);
} elseif (isset($_COOKIE['langue'])) {
    $langue=$_COOKIE['langue'];
} elseif ($langue=='' or !isset($langue)){
    $langue='Français';
}

$texte_interface['Deutsch']="Sie befinden sich auf der Seite in deutscher Sprache.";
$texte_interface['Français']="Vous êtes sur le site en langue française.";
$texte_interface['English']="You are in the English language site.";

$texte_choix['Deutsch']="Wählen Sie Ihre Spracheinstellung";
$texte_choix['Français']="Choisissez votre préférence de langue";
$texte_choix['English']="Choose your language preference";

$texte_bouton['Deutsch']="Wählen";
$texte_bouton['Français']="Choisir";
$texte_bouton['English']="Choose";
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Exercice 7-1</title>
  </head>
<body>
  <h2><?php echo $texte_interface[$langue]?></h2>
  <form method="post" action="">
    <fieldset>
    <legend><?php echo $texte_choix[$langue]?></legend>
      <select name="langue" size="1">
          <option <?php echo $langue == 'Deutsch' ? 'selected' :''?>>Deutsch
          <option <?php echo $langue == 'Français' ? 'selected' :''?>>Français
          <option <?php echo $langue == 'English' ? 'selected' :''?>>English
      </select>
    <input type="submit" value="<?php echo $texte_bouton[$langue]?>" />&nbsp;&nbsp;
    </fieldset>
  </form>
</body>
</html>
