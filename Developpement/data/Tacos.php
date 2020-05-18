<?php

class Tacos 
{
    private $idTacos;
    private $nomTacos;
    private $descriptionTacos;
    private $prixTacos;
    
    function getIdTacos() {
        return $this->idTacos;
    }

    function getNomTacos() {
        return $this->nomTacos;
    }

    function getDescriptionTacos() {
        return $this->descriptionTacos;
    }

    function getPrixTacos() {
        return $this->prixTacos;
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

    function setPrixTacos($prixTacos) {
        $this->prixTacos = $prixTacos;
    }

}
