<?php

class Sauce 
{
    private $idSauce;
    private $nomSauce;
    private $descriptionSauce;
    
    function getIdSauce() {
        return $this->idSauce;
    }

    function getNomSauce() {
        return $this->nomSauce;
    }

    function getDescriptionSauce() {
        return $this->descriptionSauce;
    }

    function setIdSauce($idSauce) {
        $this->idSauce = $idSauce;
    }

    function setNomSauce($nomSauce) {
        $this->nomSauce = $nomSauce;
    }

    function setDescriptionSauce($descriptionSauce) {
        $this->descriptionSauce = $descriptionSauce;
    }

}
