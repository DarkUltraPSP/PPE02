<?php

class TacosManager
{
    public static function findTacos($idTacos)
    {
        $tacos = new Tacos();
        $login = databaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Taille WHERE idTaille = ?");
        $state->bindParam(1, $idTacos);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $tacos->setIdTacos($lineResultat["idTaille"]);
            $tacos->setNomTacos($lineResultat["nomTaille"]);
            $tacos->setDescriptionTacos($lineResultat["descriptionTaille"]);
            $tacos->setPrixTacos($lineResultat["prixTaille"]);
        }
        
        return $tacos;
    }
    
    public static function findAllTacos()
    {
        $tacos = new Tacos();
        $tabTacos = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Taille");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $tacos = TacosManager::findTacos($lineResultat["idTaille"]);
            $tabTacos[] = $tacos;
        }
        
        return $tabTacos;
    }
}
