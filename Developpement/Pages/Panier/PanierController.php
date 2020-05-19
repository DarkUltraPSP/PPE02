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
        if (count($_SESSION["tacos"]) == 0)
        {
            unset($_SESSION["tacos"]);
        }
    }
    
    public function removeFrites($arrayPos)
    {
        unset($_SESSION["frites"][$arrayPos]);
        if (count($_SESSION["frites"]) == 0)
        {
            unset($_SESSION["frites"]);
        }
    }
    
    public function removeBoisson($arrayPos)
    {
        unset($_SESSION["boissons"][$arrayPos]);
        if (count($_SESSION["boissons"]) == 0)
        {
            unset($_SESSION["boissons"]);
        }
    }
}
