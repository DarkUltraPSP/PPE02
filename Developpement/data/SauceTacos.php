<?php

class SauceTacos 
{
    private $idSauce;
    private $idTacos;
    
    function getIdSauce() {
        return $this->idSauce;
    }

    function getIdTacos() {
        return $this->idTacos;
    }

    function setIdSauce($idSauce) {
        $this->idSauce = $idSauce;
    }

    function setIdTacos($idTacos) {
        $this->idTacos = $idTacos;
    }

}
