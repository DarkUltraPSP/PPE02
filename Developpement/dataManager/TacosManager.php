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
            $tacos->setIdTaille($lineResultat["idTaille"]);
            $tacos->setIdViande1($lineResultat["idViande1"]);
            $tacos->setIdViande2($lineResultat["idViande2"]);
            $tacos->setIdViande3($lineResultat["idViande3"]);
            $tacos->setIdSauce1($lineResultat["idSauce1"]);
            $tacos->setIdSauce2($lineResultat["idSauce2"]);
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
            $tacos = TacosManager::findAllTacos($lineResultat["idTacos"]);
            $tabTacos[] = $tacos;
        }
        
        return $tabTacos;
    }
}
