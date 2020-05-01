<?php

class TacosPanierManager 
{
    public static function findTacosPanier($idPanier)
    {
        $tacosPanier = new TacosPanier();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM TacosPanier WHERE idPanier = ?");
        $state->bindParam(1, $idPanier);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $tacosPanier->setIdPanier($lineResultat["idPanier"]);
            $tacosPanier->setIdTacos($lineResultat["idTacos"]);
        }
        
        return $tacosPanier;
    }
    
    public static function findAllTacosPanier()
    {
        $tacosPanier = new TacosPanier();
        $tabTacosPanier = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM TacosPanier");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $tacosPanier = TacosPanierManager::findAllTacosPanier($lineResultat["idPanier"]);
            $tabTacosPanier[] = $tacosPanier;
        }
        
        return $tabTacosPanier;
    }
}
