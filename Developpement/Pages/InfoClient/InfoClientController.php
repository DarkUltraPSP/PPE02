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
    
    public function insertTacos($tacos)
    {        
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
