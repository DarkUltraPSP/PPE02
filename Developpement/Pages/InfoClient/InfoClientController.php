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
        return $client;
    }
    
    public function createPanier($prixTotal)
    {
        $panier = new Panier();
        
        $panier->setPrix($prixTotal);
        
        PanierManager::insertPrixTotal($panier);
    }
    
    public function insertClientPanier($idClient, $idPanier)
    {
        $clientPanier = new ClientPanier();
        
        $clientPanier->setIdClient($idClient);
        $clientPanier->setIdPanier($idPanier);
        
        ClientPanierManager::insertClientPanier($clientPanier);
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
    
    public function insertTacosPanier($idTacos, $idPanier)
    {
        $tacosPanier = new TacosPanier();
        
        $tacosPanier->setIdPanier($idPanier);
        $tacosPanier->setIdTacos($idTacos);
        
        TacosPanierManager::insertClientPanier($tacosPanier);
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
        
        BoissonPanierManager::insertBoisson($boisson);
    }
    
    public function unsetSession()
    {
        unset($_SESSION["tacos"]);        
        unset($_SESSION["frites"]);
        unset($_SESSION["boissons"]);
    }
    
    public function redirectUser()
    {
?>
<meta http-equiv="refresh" content="0;URL=Accueil.php?page=finCommande">
<?php
    }
}
