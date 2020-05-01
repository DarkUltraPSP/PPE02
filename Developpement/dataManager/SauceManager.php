<?php

class SauceManager 
{
    public static function findSauce($idSauce)
    {
        $sauce = new Sauce();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Sauce WHERE idSauce = ?");
        $state->bindParam(1, $idSauce);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $sauce->setIdSauce($lineResultat["idSauce"]);
            $sauce->setNomSauce($lineResultat["nomSauce"]);
            $sauce->setDescriptionSauce($lineResultat["descriptionSauce"]);
        }
        
        return $sauce;
    }
    
    public static function findAllSauces()
    {
        $sauce = new Sauce();
        $tabSauce = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Sauce");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $sauce = SauceManager::findSauce($lineResultat["idSauce"]);
            $tabSauce[] = $sauce;
        }
        
        return $tabSauce;
    }
}
