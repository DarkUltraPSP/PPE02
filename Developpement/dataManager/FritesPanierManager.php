<?php

class FritesPanierManager 
{
    public static function findFritesPanier($idPanier)
    {
        $fritesPanier = new FritesPanier();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM FritesPanier WHERE idPanier = ?");
        $state->bindParam(1, $idPanier);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $fritesPanier->setIdPanier($lineResultat["idPanier"]);
            $fritesPanier->setIdFrites($lineResultat["idFrites"]);
            $fritesPanier->setQuantite($lineResultat["quantite"]);
        }
        
        return $fritesPanier;
    }
    
    public static function findAllFritesPanier()
    {
        $fritesPanier = new FritesPanier();
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM FritesPanier");
        $tabFritesPanier = [];
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $fritesPanier = FritesPanierManager::findFritesPanier($lineResultat["idPanier"]);
            $tabFritesPanier[] = $fritesPanier;
        }
        
        return $tabFritesPanier;
    }
    
    public static function insertFrites($frites) 
    {
        $login = databaseLinker::getConnexion();
        
        $idFrites = $frites->getIdFrites();
        $idPanier = $frites->getIdPanier();
        $quantite = $frites->getQuantite();
        
        $state = $login->prepare("INSERT INTO FritesPanier (idFrites, idPanier, quantite) VALUES (?,?,?)");
        
        $state->bindParam(1, $idFrites);
        $state->bindParam(2, $idPanier);
        $state->bindParam(3, $quantite);
        
        $state->execute();
    }
}