<?php

class Tacos 
{
    private $idTacos;
    private $nomTacos;
    private $descriptionTacos;
    
    function getIdTacos() {
        return $this->idTacos;
    }

    function getNomTacos() {
        return $this->nomTacos;
    }

    function getDescriptionTacos() {
        return $this->descriptionTacos;
    }

    function setIdTacos($idTacos) {
        $this->idTacos = $idTacos;
    }

    function setNomTacos($nomTacos) {
        $this->nomTacos = $nomTacos;
    }

    function setDescriptionTacos($descriptionTacos) {
        $this->descriptionTacos = $descriptionTacos;
    }

}
