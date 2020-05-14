<?php

function testConnexion($login,$password)
{
    $Mail = "admin";
    $Password = "admin";
    $codeRetour = false;
    
    if($mail == $Mail && $password == $Password)
    {
        $codeRetour = true;
    }
    
    return $codeRetour;
}
?>