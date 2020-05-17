<?php

class FritesPanier 
{
    private $idFrites;
    private $idPanier;
    private $quantite;
    
    function getIdFrites() {
        return $this->idFrites;
    }

    function getIdPanier() {
        return $this->idPanier;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function setIdFrites($idFrites) {
        $this->idFrites = $idFrites;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

}
