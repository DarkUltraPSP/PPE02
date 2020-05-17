<?php

class BoissonPanierManager 
{
    public static function findBoissonPanier($idPanier)
    {
        $boissonPanier = new BoissonPanier();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM BoissonPanier WHERE idPanier = ?");
        $state->bindParam(1, $idBoissonPanier);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $boissonPanier->setIdBoisson($lineResultat["idBoisson"]);
            $boissonPanier->setIdPanier($lineResultat["idPanier"]);
            $boissonPanier->setIdPanier($resultat["quantite"]);
        }
        
        return $boissonPanier;
    }
    
    public static function findAllBoissonsPanier()
    {
        $boissonPanier = new BoissonPanier();
        $tabBoissonPanier = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM BoissonPanier");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $boissonPanier = BoissonPanierManager::findBoissonPanier($lineResultat["idBoisson"]);
            $tabBoissonPanier[] = $boissonPanier;
        }
        
        return $tabBoissonPanier;
    }
}
