<?php

class BoissonPanier 
{
    private $idBoisson;
    private $idPanier;
    
    function getIdBoisson() {
        return $this->idBoisson;
    }

    function getIdPanier() {
        return $this->idPanier;
    }

    function setIdBoisson($idBoisson) {
        $this->idBoisson = $idBoisson;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

}
