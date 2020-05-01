<?php

class SauceTacosManager 
{
    public static function findSauceTacos($idTacos)
    {
        $sauceTacos = new SauceTacos();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM SauceTacos WHERE idTacos = ?");
        $state->bindParam(1, $idTacos);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $sauceTacos->setIdTacos($lineResultat["idTacos"]);
            $sauceTacos->setIdSauce($lineResultat["idSauce"]);
        }
        
        return $sauceTacos;
    }
    
    public static function findAllSauceTacos()
    {
        $sauceTacos = new SauceTacos();
        $tabSauceTacos = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM SauceTacos");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $sauceTacos = SauceTacosManager::findSauceTacos($lineResultat["idTacos"]);
            $tabSauceTacos[] = $sauceTacos;
        }
        
        return $tabSauceTacos;
    }
}