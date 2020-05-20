<?php

class InfoClientController 
{
    public function includeView()
    {
        include_once 'InfoClient.php';
    }
    
    public function insertClient($nom, $prenom, $adresse)
    {
        $client = new Client();
        
        $client->setNom($nom);
        $client->setPrenom($prenom);
        $client->setAdresse($adresse);
        
        ClientManager::insertClient($client);
    }
    
    public function createPanier($prixTotal)
    {
        $panier = new Panier();
        
        $panier->setPrix($prixTotal);
        
        PanierManager::insertPrixTotal($panier);
    }
    
    public function insertTacos($size, $viande1, $viande2, $viande3, $sauce1, $sauce2)
    {
        $tacos = new Tacos();
        
        $tacos->setIdTaille($size);
        $tacos->setIdViande1($viande1);
        $tacos->setIdViande2($viande2);
        $tacos->setIdViande3($viande3);
        $tacos->setIdSauce1($sauce1);
        $tacos->setIdSauce2($sauce2);
        
        TacosManager::insertTacos($tacos);
        return $tacos;
    }

    public function insertFrites($idFrites, $idPanier, $quantite)
    {
        $frites = new FritesPanier;
        
        $frites->setIdFrites($idFrites);
        $frites->setIdPanier($idPanier);
        $frites->setQuantite($quantite);
        
        FritesPanierManager::insertFrites($frites);
        
    }
    
    public function insertBoissons($idBoisson, $idPanier, $quantite)
    {
        $boisson = new BoissonPanier();
        
        $boisson->setIdBoisson($idBoisson);
        $boisson->setIdPanier($idPanier);
        $boisson->setQuantite($quantite);
    }
}
