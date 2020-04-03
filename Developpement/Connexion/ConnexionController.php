<?php

include_once '../data/Client.php';
include_once '../data/Commande.php';
include_once '../data/Produit.php';
include_once '../data/TypeProduit.php';

include_once '../dataManager/ClientManager.php';
include_once '../dataManager/CommandeManager.php';
include_once '../dataManager/dataBaseLinker.php';

session_name('user');
session_start();

include_once "include/header.php";

function testConnexion($login, $password)
{
    $clients = ClientManager::findAllClients();
    
    foreach ($clients as $client)
    {
        $codeRetour = false;

        if ($_POST["mail"] == $client->getMail() && $_POST["password"] == $client->getPassword())
        {
            $idUser = $user->getIdClient();
            $nomClient = $client->getNom();
            $prenomClient = $client->getPrenom();
            $password = $client->getPassword();
            $adresse = $client->getAdresse();
            $codeRetour = true;
            break;
        }
    }
    return $codeRetour;
}///////////////////////////////////////////////////////

if (testConnexion($_POST["pseudo"], $_POST["password"]) == true)
{
    foreach ($clients as $client)
    {
        if ($_POST["mail"] == $client->getMail() && $_POST["password"] == $user->getPassword())
        {
            $nomClient = $client->getNom();
            $prenomClient = $client->getPrenom();
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