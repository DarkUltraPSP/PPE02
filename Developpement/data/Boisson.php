<?php

class Boisson 
{
    private $idBoisson;
    private $nomBoisson;
    private $prixBoisson;
    
    function getIdBoisson() {
        return $this->idBoisson;
    }

    function getNomBoisson() {
        return $this->nomBoisson;
    }

    function getPrixBoisson() {
        return $this->prixBoisson;
    }

    function setIdBoisson($idBoisson) {
        $this->idBoisson = $idBoisson;
    }

    function setNomBoisson($nomBoisson) {
        $this->nomBoisson = $nomBoisson;
    }

    function setPrixBoisson($prixBoisson) {
        $this->prixBoisson = $prixBoisson;
    }

}
