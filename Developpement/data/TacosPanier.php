<?php

class TacosPanier
{
    private $idTacos;
    private $idPanier;
    
    function getIdTacos() {
        return $this->idTacos;
    }

    function getIdPanier() {
        return $this->idPanier;
    }

    function setIdTacos($idTacos) {
        $this->idTacos = $idTacos;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

}
