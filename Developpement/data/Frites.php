<?php

class Frites 
{
    private $idFrites;
    private $nomFrites;
    private $prixFrites;
    
    function getIdFrites() {
        return $this->idFrites;
    }

    function getNomFrites() {
        return $this->nomFrites;
    }

    function getPrixFrites() {
        return $this->prixFrites;
    }

    function setIdFrites($idFrites) {
        $this->idFrites = $idFrites;
    }

    function setNomFrites($nomFrites) {
        $this->nomFrites = $nomFrites;
    }

    function setPrixFrites($prixFrites) {
        $this->prixFrites = $prixFrites;
    }

}
