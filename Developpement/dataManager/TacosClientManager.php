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
            $tacos->setSize($lineResultat["idSize"]);
            $tacos->setViande1($lineResultat["idViande1"]);
            $tacos->setViande2($lineResultat["idViande2"]);
            $tacos->setViande3($lineResultat["idViande3"]);
            $tacos->setSauce1($lineResultat["idSauce1"]);
            $tacos->setSauce2($lineResultat["idSauce2"]);
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
    
    public function insertTacosClient($tacos)
    {
        $login = databaseLinker::getConnexion();
        
        $size = $tacos->getSize();
        $viande1 = $tacos->getViande1();
        $viande2 = $tacos->getViande2();
        $viande3 = $tacos->getViande3();
        $sauce1 = $tacos->getSauce1();
        $sauce2 = $tacos->getSauce2();
        
        $state = $login->prepare("INSERT INTO TacosClient (idSize, idViande1, idViande2, idViande3, idSauce1, idSauce2) VALUES (?,?,?,?,?,?) ");
        
        $state->bindParam(1, $size);
        $state->bindParam(2, $viande1);
        $state->bindParam(3, $viande2);
        $state->bindParam(4, $viande3);
        $state->bindParam(5, $sauce1);
        $state->bindParam(6, $sauce2);

        $state->execute();
    }
}
