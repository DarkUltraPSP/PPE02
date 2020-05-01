<?php

class ViandeTacos 
{
    private $idViande;
    private $idTacos;
    
    function getIdViande() {
        return $this->idViande;
    }

    function getIdTacos() {
        return $this->idTacos;
    }

    function setIdViande($idViande) {
        $this->idViande = $idViande;
    }

    function setIdTacos($idTacos) {
        $this->idTacos = $idTacos;
    }

}
