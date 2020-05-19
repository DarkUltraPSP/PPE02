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
}
