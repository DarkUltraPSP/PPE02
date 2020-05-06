<?php

class ViandeManager
{
    public static function findViande($idViande)
    {
        $viande = new Viande();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Viande WHERE idViande = ?");
        $state->bindParam(1, $idViande);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $viande->setIdViande($lineResultat["idViande"]);
            $viande->setNomViande($lineResultat["nomViande"]);
            $viande->setDescriptionViande($lineResultat["descriptionViande"]);
        }
        
        return $viande;
    }
    
    public static function findAllViandes()
    {
        $viande = new Viande();
        $tabViande = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Viande");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $viande = ViandeManager::findViande($lineResultat["idViande"]);
            $tabViande[] = $viande;
        }
        
        return $tabViande;
    }
}
