<?php

class ProduitCommandeManager 
{
    public static function findProduit($idCommande)
    {
        $login = DatabaseLinker::getConnexion();
        
        $prodCom = new ProduitCommande();
        
        $state = $login->prepare("SELECT * FROM ProduitCommande WHERE idCommande = ?");
        $state->bindParam(1, $idCommande);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $prodCom->setIdProduit($lineResultat["idProduit"]);
            $prodCom->setIdCommande($lineResultat["idCommande"]);
        }
        return $prodCom;
    }
    
    public static function findAllProduits()
    {
        $login = dataBaseLinker::getConnexion();
        
        $prodCom = new ProduitCommande();
        $tabProdCom = [];
        
        $state = $login->prepare("SELECT * FROM ProduitCommande");
        $state->execute();
        $resultats = $state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $prodCom = ProduitManager::findProduit($lineResultat["idCommande"]);
            $tabProdCom[] = $prodCom;
        }
        return $tabProdCom;
    }
}