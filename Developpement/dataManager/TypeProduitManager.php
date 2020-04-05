<?php

class TypeProduitManager 
{
    public static function findType($idTypeProduit)
    {
        $login = DatabaseLinker::getConnexion();
        
        $typeProduit = new TypeProduit();
        
        $state = $login->prepare("SELECT * FROM TypeProduit WHERE idTypeProduit = ?");
        $state->bindParam(1, $idTypeProduit);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $typeProduit->setIdTypeProduit($lineResultat["idTypeProduit"]);
            $typeProduit->setLibelle($lineResultat["libelle"]);
        }
        return $typeProduit;
    }
    
    public static function findAllType()
    {
        $login = dataBaseLinker::getConnexion();
        
        $typeProduit = new TypeProduit();
        $tabType = [];
        
        $state = $login->prepare("SELECT * FROM TypeProduit");
        $state->execute();
        $resultats = $state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $typeProduit = TypeProduitManager::findType($lineResultat["idTypeProduit"]);
            $tabType[] = $typeProduit;
        }
        return $tabType;
    }
}
