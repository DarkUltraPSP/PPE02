<?php

class PanierManager 
{
    public static function findPanier($idPanier)
    {
        $panier = new Panier();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Panier WHERE idPanier = ?");
        $state->bindParam(1, $idPanier);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $panier->setIdPanier($lineResultat["idPanier"]);
            $panier->setPrix($lineResultat["idPanier"]);
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
    
    public static function insertPrixTotal($panier)
    {
        $login = databaseLinker::getConnexion();
        
        $prix = $panier->getPrix();
        
        $state = $login->prepare("INSERT INTO Panier (prix) VALUES (?)");
        
        $state->bindParam(1, $prix);
        
        $state->execute();
    }
    
    public static function getLatestCartID()
    {
        $login = databaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT idPanier FROM Panier ORDER BY idPanier DESC LIMIT 1");
        
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $latestCart = $lineResultat["idPanier"];
        }
        
        return $latestCart;
    }
}
