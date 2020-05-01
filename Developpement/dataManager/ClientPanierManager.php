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
}
