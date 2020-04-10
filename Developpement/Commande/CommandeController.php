<?php

class CommandeController
{
    public function includeView()
    {
        include_once 'Commande.php';
    }
    
    public function displayProduit()
    {
        $prods = ProduitManager::findAllProduits();
        $types = TypeProduitManager::findAllType();
        
        foreach ($prods as $prod)
        {
            echo $prod->getNomProduit();
            echo $prod->getPathPhoto();
            echo $prod->getPrixProduit();
        }
    }
}