<?php

class Tacos 
{
    private $idTacos;
    private $idTaille;
    private $idViande1;
    private $idViande2;
    private $idViande3;
    private $idSauce1;
    private $idSauce2;
    
    function getIdTacos() {
        return $this->idTacos;
    }

    function getIdTaille() {
        return $this->idTaille;
    }

    function getIdViande1() {
        return $this->idViande1;
    }

    function getIdViande2() {
        return $this->idViande2;
    }

    function getIdViande3() {
        return $this->idViande3;
    }

    function getIdSauce1() {
        return $this->idSauce1;
    }

    function getIdSauce2() {
        return $this->idSauce2;
    }

    function setIdTacos($idTacos) {
        $this->idTacos = $idTacos;
    }

    function setIdTaille($idTaille) {
        $this->idTaille = $idTaille;
    }

    function setIdViande1($idViande1) {
        $this->idViande1 = $idViande1;
    }

    function setIdViande2($idViande2) {
        $this->idViande2 = $idViande2;
    }

    function setIdViande3($idViande3) {
        $this->idViande3 = $idViande3;
    }

    function setIdSauce1($idSauce1) {
        $this->idSauce1 = $idSauce1;
    }

    function setIdSauce2($idSauce2) {
        $this->idSauce2 = $idSauce2;
    }

}
