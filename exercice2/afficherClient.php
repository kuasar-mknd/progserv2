<?php

require_once 'config/autoload.php';

/**
 * Affiche les informations d'un client
 * @param int $idClient L'identifiant du client
 * @return string Les informations du client
 */
function afficheClient(int $idClient): string {
    $client = GestionnaireBD::recupereClient($idClient);
    $resultat = "Client n°$idClient :<br>";
    $resultat .= "Nom : " . $client->getNom() . "<br>";
    $resultat .= "Prénom : " . $client->getPrenom() . "<br>";
    $resultat .= "Adresse : " . $client->getAdresse() . "<br>";
    $resultat .= "Code postal : " . $client->getCodePostal() . "<br>";
    $resultat .= "Localité : " . $client->getLocalite() . "<br>";
    $resultat .= "Téléphone : " . $client->getTelephone() . "<br>";
    $resultat .= "Email : " . $client->getEmail() . "<br>";
    $resultat .= "Date de naissance : " . $client->getDateNaissance() . "<br>";
    $resultat .= "Date d'inscription : " . $client->getDateInscription() . "<br>";
    $resultat .= "Date de dernière connexion : " . $client->getDateDerniereConnexion() . "<br>";
    $resultat .= "Nombre de connexions : " . $client->getNbConnexions() . "<br>";
    $resultat .= "Mot de passe : " . $client->getMotDePasse() . "<br>";
    return $resultat;
