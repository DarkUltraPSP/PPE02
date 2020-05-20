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
    
    public function insertTacosM($size, $viande1, $sauce1)
    {
        $tacos = new Tacos();
        
        $tacos->setIdTaille($size);
        $tacos->setViande1($viande1);
        $tacos->setSauce1($sauce1);
        
        TacosManager::insertTacos($tacos);
    }
    
    public function insertTacosL($size, $viande1, $viande2, $sauce1, $sauce2)
    {
        $tacos = new Tacos();
        
        $tacos->setIdTaille($size);
        $tacos->setViande1($viande1);
        $tacos->setViande2($viande2);
        $tacos->setSauce1($sauce1);
        $tacos->setSauce2($sauce2);
        
        TacosManager::insertTacos($tacos);
    }
    
    public function insertTacosXL($size, $viande1, $viande2, $viande3, $sauce1, $sauce2)
    {
        $tacos = new Tacos();
        
        $tacos->setIdTaille($size);
        $tacos->setViande1($viande1);
        $tacos->setViande2($viande2);
        $tacos->setViande3($viande3);
        $tacos->setSauce1($sauce1);
        $tacos->setSauce2($sauce2);
        
        TacosManager::insertTacos($tacos);
    }
    
    public function insertFrites($idFrites, $idPanier, $quantite)
    {
        $frites = new FritesPanier;
        
        $frites->setIdFrites($idFrites);
        $frites->setIdPanier($idPanier);
        $frites->setQuantite($quantite);
    }
    
    public function insertBoissons($idBoisson, $idPanier, $quantite)
    {
        $boisson = new BoissonPanier();
        
        $boisson->setIdBoisson($idBoisson);
        $boisson->setIdPanier($idPanier);
        $boisson->setQuantite($quantite);
    }
}
