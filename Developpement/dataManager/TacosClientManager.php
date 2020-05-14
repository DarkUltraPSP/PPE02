<?php

class TacosClientManager 
{
    public static function findTacosClient($idTacosClient)
    {
        $tacos = new TacosClient();
        $login = databaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM TacosClient WHERE idTacosClient = ?");
        $state->bindParam(1, $idTacosClient);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $tacos->setIdTacosClient($lineResultat["idTacosClient"]);
            $tacos->setViande1($lineResultat["viande1"]);
            $tacos->setViande2($lineResultat["viande2"]);
            $tacos->setViande3($lineResultat["viande3"]);
            $tacos->setSauce1($lineResultat["Sauce1"]);
            $tacos->setSauce2($lineResultat["Sauce2"]);
        }
        
        return $tacos;
    }
    
    public static function findAllTacosClient()
    {
        $tacosClient = new TacosClient();
        $tabTacosClient = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM TacosClient");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $tacosClient = TacosClientManager::findTacosClient($lineResultat["idTacosClient"]);
            $tabTacosClient[] = $tacosClient;
        }
        
        return $tabTacosClient;
    }
}
