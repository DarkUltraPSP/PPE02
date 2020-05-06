<?php
$Client = new client();

if (!isset($_SESSION))
{
    session_name("Users");
    session_start();
}

function testConnexion($mail, $password)
{
    $clients = ClientManager::findAllClients();
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
    $clients = ClientManager::findAllClients();
    
        foreach ($clients as $client)
        {
            if (!empty($_POST["mail"])&& !empty($_POST["password"]))
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