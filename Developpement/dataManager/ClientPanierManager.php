<?php

class ClientPanierManager 
{
    public static function findClientPanier($idClient)
    {
        $clientPanier = new ClientPanier();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM ClientPanier WHERE idPanier = ?");
        $state->bindParam(1, $idClient);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $clientPanier->setIdClient($lineResultat["idPanier"]);
            $clientPanier->setIdPanier($lineResultat["idClient"]);
        }
        
        return $clientPanier;
    }
    
    public static function findAllClients()
    {
        $clientPanier = new ClientPanier();
        $tabClientPanier = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM ClientPanier");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $clientPanier = ClientManager::findClientPanier($lineResultat["idPanier"]);
            $tabClientPanier[] = $clientPanier;
        }
        
        return $tabClientPanier;
    }
    
    public static function insertClientPanier($client)
    {
        $login = databaseLinker::getConnexion();
        
        $idClient = $client->getIdClient();
        $idPanier = $client->getIdPanier();
        
        $state = $login->prepare("INSERT INTO ClientPanier (idClient, idPanier) VALUES (?,?)");
        
        $state->bindParam(1, $idClient);
        $state->bindParam(2, $idPanier);
        
        $state->execute();
    }
    
    public static function getLatestClientID()
    {
        $login = databaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT idClient FROM Client ORDER BY idClient DESC LIMIT 1");
        
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $latestClient = $lineResultat["idClient"];
        }
        
        return $latestClient;
    }
}
