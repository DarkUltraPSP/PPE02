<?php

class TacosManager
{
    public static function findTacos($idTacos)
    {
        $tacos = new Tacos();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Tacos WHERE idTacos = ?");
        $state->bindParam(1, $idTacos);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $tacos->setIdTacos($lineResultat["idTacos"]);
            $tacos->setNomTacos($lineResultat["nomTacos"]);
            $tacos->setDescriptionTacos($lineResultat["descriptionTacos"]);
        }
        
        return $tacos;
    }
    
    public static function findAllTacos()
    {
        $tacos = new Tacos();
        $tabTacos = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Tacos");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $tacos = TacosManager::findTacos($lineResultat["idTacos"]);
            $tabTacos[] = $tacos;
        }
        
        return $tabTacos;
    }
}
