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
    
    public function insertTacos($size, $viande1, $viande2, $viande3, $sauce1, $sauce2)
    {
        $tacos = new TacosClient;
        
        $tacos->setSize($size);
        $tacos->setViande1($viande1);
        $tacos->setViande2($viande2);
        $tacos->setViande3($viande3);
        $tacos->setSauce1($sauce1);
        $tacos->setSauce2($sauce2);
    }
}
