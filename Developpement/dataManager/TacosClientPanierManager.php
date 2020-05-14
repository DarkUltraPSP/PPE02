<?php

class TacosClientPanierManager 
{
    public static function findTacosClientPanier($idPanier)
    {
        $tacos = new TacosClientPanier();
        $login = databaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM TacosClientPanier WHERE idPanier = ?");
        $state->bindParam(1, $idPanier);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $tacos->setIdPanier($lineResultat["idPanier"]);
            $tacos->setIdTacosClient($lineResultat["idTacosClient"]);
        }
        
        return $tacos;
    }
    
    public static function findAllTacosClientPanier()
    {
        $tacos = new TacosClientPanier();
        $tabTacosClientPanier = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM TacosClientPanier");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $tacos = TacosClientPanierManager::findTacosClientPanier($lineResultat["idPanier"]);
            $tabTacosClientPanier[] = $tacos;
        }
        
        return $tabTacosClientPanier;
    }
}
