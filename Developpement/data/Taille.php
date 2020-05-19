<?php

class Taille 
{
    private $idTaille;
    private $nomTaille;
    private $descriptionTaille;
    private $prixTaille;
    
    function getIdTaille() {
        return $this->idTaille;
    }

    function getNomTaille() {
        return $this->nomTaille;
    }

    function getDescriptionTaille() {
        return $this->descriptionTaille;
    }

    function getPrixTaille() {
        return $this->prixTaille;
    }

    function setIdTaille($idTaille) {
        $this->idTaille = $idTaille;
    }

    function setNomTaille($nomTaille) {
        $this->nomTaille = $nomTaille;
    }

    function setDescriptionTaille($descriptionTaille) {
        $this->descriptionTaille = $descriptionTaille;
    }

    function setPrixTaille($prixTaille) {
        $this->prixTaille = $prixTaille;
    }
    
}
