<?php

class BoissonManager
{
    public static function findBoisson($idBoisson)
    {
        $boisson = new Boisson();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Boisson WHERE idBoisson = ?");
        $state->bindParam(1, $idBoisson);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $boisson->setIdBoisson($lineResultat["idBoisson"]);
            $boisson->setNomBoisson($lineResultat["nomBoisson"]);
            $boisson->setPrixBoisson($lineResultat["prixBoisson"]);
        }
        
        return $boisson;
    }
    
    public static function findAllBoissons()
    {
        $boisson = new Boisson();
        $tabBoissons = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Boisson");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $boisson = BoissonManager::findBoisson($lineResultat["idBoisson"]);
            $tabBoissons[] = $boisson;
        }
        
        return $tabBoissons;
    }
}