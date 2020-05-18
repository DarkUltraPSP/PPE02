<?php

class PanierController 
{
    public function includeView()
    {
        include_once 'Panier.php';
    }
    
    public function refreshPanier()
    {
        ?>
<meta http-equiv="refresh" content="0;URL=Accueil.php?page=panier">
<?php
    }
    
    public function removeTacos($arrayPos)
    {
        unset($_SESSION["tacos"][$arrayPos]);
    }
    
    public function removeFrites($arrayPos)
    {
        unset($_SESSION["frites"][$arrayPos]);
    }
    
    public function removeBoisson($arrayPos)
    {
        unset($_SESSION["boissons"][$arrayPos]);
    }
}
