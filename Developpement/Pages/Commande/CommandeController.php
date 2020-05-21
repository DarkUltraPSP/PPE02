<?php

class CommandeController
{
    public function includeView()
    {
        include_once 'Commande.php';
    }
    
    
    public function refreshTacos()
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
    
    public function setTacosMObjet($size, $viande1, $sauce1)
    {
        $tacos = new Tacos();
        
        $tacos->setIdTaille($size);
        $tacos->setIdViande1($viande1);
        $tacos->setIdSauce1($sauce1);
        
        $_SESSION["tacos"][] = $tacos;
    }
    
    public function setTacosLObjet($size, $viande1, $viande2, $sauce1, $sauce2)
    {
        $tacos = new Tacos();
        
        $tacos->setIdTaille($size);
        $tacos->setIdViande1($viande1);
        $tacos->setIdViande2($viande2);
        $tacos->setIdSauce1($sauce1);
        $tacos->setIdSauce2($sauce2);
        
        $_SESSION["tacos"][] = $tacos;
    }
    
    public function setTacosXLObjet($size, $viande1, $viande2, $viande3, $sauce1, $sauce2)
    {
        $tacos = new Tacos();
        
        $tacos->setIdTaille($size);
        $tacos->setIdViande1($viande1);
        $tacos->setIdViande2($viande2);
        $tacos->setIdViande3($viande3);
        $tacos->setIdSauce1($sauce1);
        $tacos->setIdSauce2($sauce2);

        $_SESSION["tacos"][] = $tacos;
    }
    
    public function unsetSessionTacos() 
    {
        unset($_SESSION['size']);
        unset($_SESSION['viande0']);
        unset($_SESSION['viande1']);
        unset($_SESSION['viande2']);
        unset($_SESSION['sauce0']);
        unset($_SESSION['sauce1']);
    }
    
    
    public function refreshFrites()
    {
?>
<meta http-equiv="refresh" content="0;URL=Accueil.php?page=commander&typeProduit=Frites">
<?php
    }
    
    public function setFrites($idFrites)
    {
        $_SESSION["idFrites"] = $idFrites;
    }
    
    public function setQuantiteFrites($quantite)
    {
        $_SESSION["quantiteFrites"] = $quantite;
    }
    
    public function setFritesObjet($idFrites, $quantite)
    {
            $frite = new FritesPanier();

            $frite->setIdFrites($idFrites);
            $frite->setQuantite($quantite);

            $_SESSION["frites"][] = $frite;
        
    }
    
    public function unsetSessionFrites()
    {
        unset($_SESSION["idFrites"]);
        unset($_SESSION["quantiteFrites"]);
    }
    
    
    public function refreshBoisson()
    {
?>
<meta http-equiv="refresh" content="0;URL=Accueil.php?page=commander&typeProduit=Boissons">
<?php
    }
    
    public function setBoisson($idBoisson)
    {
        $_SESSION["idBoisson"] = $idBoisson;
    }
    
    public function setQuantiteBoisson($quantite)
    {
        $_SESSION["quantiteBoisson"] = $quantite;
    }
    
    public function setBoissonObjet($idBoisson, $quantite)
    {
        $boisson = new BoissonPanier();
        
        $boisson->setIdBoisson($idBoisson);
        $boisson->setQuantite($quantite);
        
        $_SESSION["boissons"][] = $boisson;
    }
    
    public function unsetSessionBoisson()
    {
        unset($_SESSION["idBoisson"]);
        unset($_SESSION["quantiteBoisson"]);
    }
}