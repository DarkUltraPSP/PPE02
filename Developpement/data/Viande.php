<?php

class Viande 
{
    private $idViande;
    private $nomViande;
    private $descriptionViande;
    
    function getIdViande() {
        return $this->idViande;
    }

    function getNomViande() {
        return $this->nomViande;
    }

    function getDescriptionViande() {
        return $this->descriptionViande;
    }

    function setIdViande($idViande) {
        $this->idViande = $idViande;
    }

    function setNomViande($nomViande) {
        $this->nomViande = $nomViande;
    }

    function setDescriptionViande($descriptionViande) {
        $this->descriptionViande = $descriptionViande;
    }

}
