<?php

class FritesManager 
{
    public static function findFrites($idFrites)
    {
        $frites = new Frites();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Frites WHERE idFrites = ?");
        $state->bindParam(1, $idFrites);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $frites->setIdFrites($lineResultat["idFrites"]);
            $frites->setNomFrites($lineResultat["nomFrites"]);
            $frites->setPrixFrites($lineResultat["prixFrites"]);
        }
        
        return $frites;
    }
    
    public static function findAllFrites()
    {
        $frites = new Frites();
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Frites");
        $tabFrites = [];
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $frites = FritesManager::findFrites($lineResultat["idFrites"]);
            $tabFrites[] = $frites;
        }
        
        return $tabFrites;
    }
}
