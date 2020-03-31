<?php

class ClientManager
{
    public static function findClient($idClient)
    {
        $login = DatabaseLinker::getConnexion();
        
        $client = new Client();
        
        $state = $login->prepare("SELECT * FROM Client WHERE idClient = ?");
        $state->bindParam(1, $idClient);
        $state-> execute();
        $resultat = $state -> fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $client->setIdClient($lineResultat["idClient"]);
            $client->setNomClient($lineResultat["nomClient"]);
            $client->setPrenomClient($lineResultat["prenom"]);
            $client->setAdresse($lineResultat["adresse"]);
            $client->setPassword($lineResultat["password"]);
            $client->setMail($lineResultat["mail"]);
        }
        return $client;
    }
    
    public static function findAllClients()
    {
        $login = dataBaseLinker::getConnexion();
        
        $client = new Client();
        $tabClient = [];
        
        $state = $login->prepare("SELECT * FROM Client");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $client = ClientManager::findClient($lineResultat["idClient"]);
            $tabClient[] = $client;
        }
        return $tabClient;
    }
}
