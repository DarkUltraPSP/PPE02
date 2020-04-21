<?php

class CommandeController
{
    public function includeView()
    {
        include_once 'Commande.php';
    }
    
    public function setTacosSize($size)
    {
        $_SESSION["size"] = $size;
    }
    
    public function setViande($viande)
    {
        $_SESSION["viande"] = $viande;
    }
}