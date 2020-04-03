<?php

include_once '../data/Client.php';
include_once '../data/Commande.php';
include_once '../data/Produit.php';
include_once '../data/TypeProduit.php';

include_once '../dataManager/ClientManager.php';
include_once '../dataManager/CommandeManager.php';
include_once '../dataManager/dataBaseLinker.php';

session_name("client");
session_start();

$clients = ClientManager::findAllClients();

function testConnexion($mail, $password)
{
    foreach ($clients as $client)
    {
        $codeRetour = false;

        if ($_POST["mail"] == $client->getMail() && $_POST["password"] == $client->getPassword())
        {
            $idClient = $client->getIdClient();
            $nomClient = $client->getNomClient();
            $prenomClient = $client->getPrenomClient();
            $password = $client->getPassword();
            $adresse = $client->getAdresse();
            $codeRetour = true;
            break;
        }
    }
    return $codeRetour;
}

if (testConnexion($_POST["mail"], $_POST["password"]) == true)
{
    foreach ($clients as $client)
    {
        if ($_POST["mail"] == $client->getMail() && $_POST["password"] == $user->getPassword())
        {
            $idClient = $client->getIdClient();
            $nomClient = $client->getNomClient();
            $prenomClient = $client->getPrenomClient();
            $password = $client->getPassword();
            $adresse = $client->getAdresse();
        }
    }
    $_SESSION["nomClient"] = $nomClient;
    $_SESSION["prenomClient"] = $prenomClient;
    $_SESSION["mail"] = $mail;
    $_SESSION["adresse"] = $adresse;
    $_SESSION["idClient"] = $idClient;
    
    header('Location: index.php');
    exit;
}
else
{
    echo "Votre adresse mail ou votre mot de passe est incorrect.";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="5; URL=Connexion.php">
    <?php
}