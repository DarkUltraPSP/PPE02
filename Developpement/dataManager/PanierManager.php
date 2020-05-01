<?php

class PanierManager 
{
    public static function findPanier($idPanier)
    {
        $idPanier = new Panier();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Panier WHERE idPanier = ?");
        $state->bindParam(1, $idPanier);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $idPanier->setIdPanier($lineResultat["idPanier"]);
        }
        
        return $idPanier;
    }
    
    public static function findAllPaniers()
    {
        $panier = new Panier();
        $tabPanier = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Panier");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $panier = PanierManager::findPanier($lineResultat["idPanier"]);
            $tabPanier[] = $panier;
        }
        
        return $tabPanier;
    }
}
