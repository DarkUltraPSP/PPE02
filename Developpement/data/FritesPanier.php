<?php

class FritesPanier 
{
    private $idFrites;
    private $idPanier;
    
    function getIdFrites() {
        return $this->idFrites;
    }

    function getIdPanier() {
        return $this->idPanier;
    }

    function setIdFrites($idFrites) {
        $this->idFrites = $idFrites;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

}
