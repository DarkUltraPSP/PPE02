<?php

class CommandeController
{
    public function includeView()
    {
        include_once 'Commande.php';
    }
    
    public function refresh()
    {
?>
<meta http-equiv="refresh" content="0;URL=Accueil.php?page=commander&typeProduit=Tacos">
<?php
    }
    
    public function size($size)
    {
        $_SESSION['size'] = $size;
    }
    
    public function setViandes($tabViandes) 
    {
        for ($index = 0; $index < count($tabViandes); $index++) 
        {
            $_SESSION["viande$index"] = $tabViandes[$index];
        }
    }
    
    public function setSauce($tabSauce) 
    {
        for ($index; $index < count($tabSauce); $index++) 
        {
            $_SESSION["Sauce$index"] = $tabSauce[$index];
        }
    }
    
    public function unsetSession() 
    {
        unset($_SESSION['size']);
        unset($_SESSION['viande1']);
        unset($_SESSION['viande2']);
        unset($_SESSION['viande3']);
        unset($_SESSION['sauce1']);
        unset($_SESSION['sauce2']);

    }
}