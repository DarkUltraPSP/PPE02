<?php

class TacosPanierManager
{
    public static function findTacosPanier($idPanier)
    {
        $tacosP = new TacosPanier();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM TacosPanier WHERE idPanier = ?");
        $state->bindParam(1, $idPanier);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $tacosP->setIdPanier($lineResultat["idPanier"]);
            $tacosP->setIdTacos($lineResultat["idTacos"]);
        }
        
        return $tacosP;
    }
    
    public static function findAllTacosPanier()
    {
        $tacosP = new TacosPanier();
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM TacosPanier");
        $tabTacosP = [];
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $tacosP = TacosPanierManager::findAllTacosPanier($lineResultat["idPanier"]);
            $tabTacosP[] = $tacosP;
        }
        
        return $tabTacosP;
    }
    
        public static function insertClientPanier($tacos)
    {
        $login = databaseLinker::getConnexion();
        
        $idTacos = $tacos->getIdTacos();
        $idPanier = $tacos->getIdPanier();
        
        $state = $login->prepare("INSERT INTO TacosPanier (idTacos, idPanier) VALUES (?,?)");
        
        $state->bindParam(1, $idTacos);
        $state->bindParam(2, $idPanier);
        
        $state->execute();
    }
}
