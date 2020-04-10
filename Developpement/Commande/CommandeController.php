<?php
include_once '../dataManager/ProduitManager.php';
include_once '../dataManager/TypeProduitManager.php';

class CommandeController
{
    public function includeView()
    {
        include_once 'Commande.php';
    }
    
    public function displayTacos()
    {
        $prods = ProduitManager::findAllProduits();
        $types = TypeProduitManager::findAllType();
        
        foreach ($prods as $prod)
        {
            foreach ($types as $type)
            {
                if ($type == 1)
                {
                    echo $prod->getNomProduit();
                    echo $prod->getPathPhoto();
                    echo $prod->getDescription();
                    echo $prod->getPrixProduit();
                }
            }
            
        }
    }
}