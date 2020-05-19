<?php

class TailleManager 
{
    public static function findTaille($idTaille)
    {
        $taille = new Taille();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Taille WHERE idTaille = ?");
        $state->bindParam(1, $idTaille);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $taille->setIdTaille($lineResultat["idTaille"]);
            $taille->setNomTaille($lineResultat["nomTaille"]);
            $taille->setDescriptionTaille($lineResultat["descriptionTaille"]);
            $taille->setPrixTaille($lineResultat["prixTaille"]);
        }
        
        return $taille;
    }
    
    public static function findAllTailles()
    {
        $taille = new Taille();
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Taille");
        $tabTaille = [];
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $taille = TailleManager::findTaille($lineResultat["idTaille"]);
            $tabTaille[] = $taille;
        }
        
        return $tabTaille;
    }
}
