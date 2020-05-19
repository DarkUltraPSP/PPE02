<link rel="stylesheet" type="text/css" href="css/commande.css" media="all"/>
<?php

class CommandeController
{
    public function includeView()
    {
        include_once 'Commande.php';
    }
    
    public function size($size)
    {
        $_SESSION['size'] = $size;
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
    
    public function redirectUser()
    {
        header ("Location: Accueil.php");
    }
    
    public function checkNbViandes($tabViande)
    {
        $isNbViandeOK = false;
        if (count($tabViande) == $_SESSION["size"])
        {
            $isNbViandeOK = true;
        }
        return $isNbViandeOK;
    }
}