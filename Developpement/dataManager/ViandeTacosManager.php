<?php

class ViandeTacosManager 
{
    public static function findViandeTacos($idTacos)
    {
        $viandeTacos = new ViandeTacos();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM ViandeTacos WHERE idTacos = ?");
        $state->bindParam(1, $idTacos);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $viandeTacos->setIdTacos($lineResultat["idTacos"]);
            $viandeTacos->setIdViande($lineResultat["idViande"]);
        }
        
        return $viandeTacos;
    }
    
    public static function findAllViandeTacos()
    {
        $viandeTacos = new ViandeTacos();
        $tabViandeTacos = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM ViandeTacos");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $viandeTacos = ViandeTacosManager::findViandeTacos($lineResultat["idTacos"]);
            $tabViandeTacos[] = $viandeTacos;
        }
        
        return $tabViandeTacos;
    }
}
