<?php

class Panier 
{
    private $idPanier;
    private $quantite;
    
    function getIdPanier() {
        return $this->idPanier;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

}
