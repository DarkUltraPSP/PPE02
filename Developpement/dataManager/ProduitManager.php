<?php

class ProduitManager 
{
    public static function findProduit($idProduit)
    {
        $login = DatabaseLinker::getConnexion();
        
        $produit = new Produit();
        
        $state = $login->prepare("SELECT * FROM Produit WHERE idProduit = ?");
        $state->bindParam(1, $idProduit);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $produit->setIdProduit($lineResultat["idProduit"]);
            $produit->setNomProduit($lineResultat["nomProduit"]);
            $produit->setPrixProduit($lineResultat["prixProduit"]);
            $produit->setDescription($lineResultat["descriptionProduit"]);
            $produit->setPathPhoto($lineResultat["pathPhoto"]);
            $produit->setIdType($lineResultat["idTypeProduit"]);
        }
        return $produit;
    }
    
    public static function findAllProduits()
    {
        $login = dataBaseLinker::getConnexion();
        
        $produit = new Produit();
        $tabProduit = [];
        
        $state = $login->prepare("SELECT * FROM Produit");
        $state->execute();
        $resultats = $state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $produit = ProduitManager::findProduit($lineResultat["idProduit"]);
            $tabProduit[] = $produit;
        }
        return $tabProduit;
    }
}
