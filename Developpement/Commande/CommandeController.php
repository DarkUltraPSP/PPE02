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
        for ($index = 0; $index < count($tabSauce); $index++) 
        {
            $_SESSION["sauce$index"] = $tabSauce[$index];
        }
    }
    
    public function setTacosMSession($size, $viande1, $sauce1)
    {
        $tacos = new TacosClient();
        
        $tacos->setSize($size);
        $tacos->setViande1($viande1);
        $tacos->setSauce1($sauce1);
        
        $_SESSION["tacos"][] = $tacos;
    }
    
    public function setTacosLSession($size, $viande1, $viande2, $sauce1, $sauce2)
    {
        $tacos = new TacosClient();
        
        $tacos->setSize($size);
        $tacos->setViande1($viande1);
        $tacos->setViande2($viande2);
        $tacos->setSauce1($sauce1);
        $tacos->setSauce2($sauce2);
        
        $_SESSION["tacos"][] = $tacos;
    }
    
    public function setTacosXLSession($size, $viande1, $viande2, $viande3, $sauce1, $sauce2)
    {
        $tacos = new TacosClient();
        
        $tacos->setSize($size);
        $tacos->setViande1($viande1);
        $tacos->setViande2($viande2);
        $tacos->setViande3($viande3);
        $tacos->setSauce1($sauce1);
        $tacos->setSauce2($sauce2);

        $_SESSION["tacos"][] = $tacos;
    }
    
    public function unsetSession() 
    {
        unset($_SESSION['size']);
        unset($_SESSION['viande0']);
        unset($_SESSION['viande1']);
        unset($_SESSION['viande2']);
        unset($_SESSION['sauce0']);
        unset($_SESSION['sauce1']);
    }
}