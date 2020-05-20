<?php

class Panier 
{
    private $idPanier;
    private $prix;
    
    function getIdPanier() {
        return $this->idPanier;
    }

    function getPrix() {
        return $this->prix;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

}
