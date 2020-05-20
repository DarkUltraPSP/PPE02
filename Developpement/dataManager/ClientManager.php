<?php

class ClientManager 
{
    public static function findClient($idClient)
    {
        $client = new Client();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Client WHERE idClient = ?");
        $state->bindParam(1, $idClient);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $client->setIdClient($lineResultat["idClient"]);
            $client->setNom($lineResultat["nomClient"]);
            $client->setPrenom($lineResultat["prenomClient"]);
            $client->setAdresse($lineResultat["adresse"]);
        }
        
        return $client;
    }
    
    public static function findAllClients()
    {
        $client = new Client();
        $tabClient = [];
        $login = dataBaseLinker::getConnexion();
        
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
    
    public static function insertClient($client)
    {
        $login = databaseLinker::getConnexion();
        
        $nom = $client->getNom();
        $prenom = $client->getPrenom();
        $adresse = $client->getAdresse();
        
        $state = $login->prepare("INSERT INTO Client (nomClient, prenomClient, adresse) VALUES (?, ?, ?)");
        
        $state->bindParam(1, $nom);
        $state->bindParam(2, $prenom);
        $state->bindParam(3, $adresse);
        
        $state->execute();
    }
}
