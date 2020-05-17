<?php

class BoissonPanier 
{
    private $idBoisson;
    private $idPanier;
    private $quantite;
    
    function getIdBoisson() {
        return $this->idBoisson;
    }

    function getIdPanier() {
        return $this->idPanier;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function setIdBoisson($idBoisson) {
        $this->idBoisson = $idBoisson;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

}
