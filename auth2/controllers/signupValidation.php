<?php

require_once('../config/autoload.php');

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use ch\comem\DbManager;

$firstnameErr = $lastnameErr = $emailErr = $mobileErr = $passwordErr = $emailValidationErr = $successMsg = "";

if (filter_has_var(INPUT_POST, 'submit')) {

    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_UNSAFE_RAW);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_UNSAFE_RAW);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mobilenumber = filter_input(INPUT_POST, 'mobilenumber', FILTER_UNSAFE_RAW);
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
    $validationError = false;
    
    if (empty($firstname)) {
        $firstnameErr = '<div class="alert alert-danger">
                    Il faut un prénom.
                </div>';
        $validationError = true;
    } else if (!preg_match("/[A-Z][a-zäàâèêéïöôüç]+([- ]?[A-Z][a-zäàâèêéïöôüç]+)?/", $firstname)) {
        $firstnameErr = '<div class="alert alert-danger">
                            Le prénom ne doit contenir que des lettres, tirets et espaces
                        </div>';
        $validationError = true;
    }

    if (empty($lastname)) {
        $lastnameErr = '<div class="alert alert-danger">
                Il faut un nom.
            </div>';
        $validationError = true;
    } else if (!preg_match("/[A-Z][a-zäàâèêéïöôüç]+([- ]?[A-Z][a-zäàâèêéïöôüç]+)?/", $lastname)) {
        $lastnameErr = '<div class="alert alert-danger">
                            Le nom ne doit contenir que des lettres, tirets et espaces
                        </div>';
        $validationError = true;
    }

    $db = new DbManager();
    if (!$email) {
        $emailErr = "<div class='alert alert-danger'>
                            L'email doit être valide !
                        </div>";
        $validationError = true;
    } else if ($db->emailExist($email)) {
        $emailErr = "<div class='alert alert-danger'>
                            Cet email est déjà utilisé !
                        </div>";
        $validationError = true;
    }

    if (empty($mobilenumber)) {
        $mobileErr = '<div class="alert alert-danger">
            Il faut un numéro de mobile.
        </div>';
        $validationError = true;
    } else if (!preg_match("/^[0-9]{10}+$/", $mobilenumber)) {
        $mobileErr = '<div class="alert alert-danger">
                            Le numéro de mobile doit contenir 10 chiffres.
                        </div>';
        $validationError = true;
    }

    if (empty($password)) {
        $passwordErr = '<div class="alert alert-danger">
            Il faut un mot de passe.
        </div>';
        $validationError = true;
    } else if (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $password)) {
        $passwordErr = '<div class="alert alert-danger">
                        Le mot de passe doit avoir entre 8 et 20 caractères et contenir au moins : <br>- un caractère spécial,<br> - une minuscule,<br> - une majuscule,<br> - et un chiffre.
                    </div>';
        $validationError = true;
    }

    if (!$validationError) {
        $token = md5(rand() . time());
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $ok = $db->storeUser($firstname, $lastname, $email, $mobilenumber, $password_hash, $token);

        if (!$ok) {
            die("Problème d'enregistrement de l'utilisateur dans la base de données MySql");
        } else {
            $url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
            $url .= "://".$_SERVER['HTTP_HOST'];
            $url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
            $msg = 'Veuillez cliquer sur le lien de validation de votre email. <br><br>
                          <a href="'. $url .'userActivation.php?token=' . $token . '">Cliquez ici pour valider votre email</a>';
            $transport = Transport::fromDsn('smtp://localhost:1025');
            $mailer = new Mailer($transport);
            $email = (new Email())
                    ->from('comem@heig-vd.ch')
                    ->to($email)
                    //->cc('cc@exemple.com')
                    //->bcc('bcc@exemple.com')
                    //->replyTo('replyto@exemple.com')
                    //->priority(Email::PRIORITY_HIGH)
                    ->subject('Concerne : Validation de votre compte')
                    ->html($msg);
            $mailer->send($email);

            $successMsg = "<div class='alert alert-success'>
                                L'email permettant la validation de votre compte a été envoyé !
                            </div>";
        }
    }
}
?>