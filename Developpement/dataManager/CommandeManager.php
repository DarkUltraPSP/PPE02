<?php

class CommandeManager 
{
    public static function findCommande($idCommande)
    {
        $login = DatabaseLinker::getConnexion();
        
        $commande = new Commande();
        
        $state = $login->prepare("SELECT * FROM Commande WHERE idCommande = ?");
        $state->bindParam(1, $idCommande);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $commande->setIdCommande($lineResultat["idCommande"]);
            $commande->setDateCommande($lineResultat["dateCommande"]);
            $commande->setQuantite($lineResultat["quantite"]);
            $commande->setIdClient($lineResultat["idClient"]);
        }
        return $commande;
    }
    
    public static function findAllCommandes()
    {
        $login = dataBaseLinker::getConnexion();
        
        $commande = new Commande();
        $tabCommande = [];
        
        $state = $login->prepare("SELECT * FROM Commande ORDER BY dateCommande DESC");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $commande = CommandeManager::findCommande($lineResultat["idCommande"]);
            $tabCommande[] = $commande;
        }
        return $tabCommande;
    }
    
    public static function insertCommande($commande)
    {
        $login = dataBaseLinker::getConnexion();

        
    }
}
