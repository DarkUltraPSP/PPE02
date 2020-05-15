<?php

class TacosClient 
{
    private $idTacosClient;
    private $size;
    private $viande1;
    private $viande2;
    private $viande3;
    private $sauce1;
    private $sauce2;
    
    function getIdTacosClient() {
        return $this->idTacosClient;
    }

    function getSize() {
        return $this->size;
    }

    function getViande1() {
        return $this->viande1;
    }

    function getViande2() {
        return $this->viande2;
    }

    function getViande3() {
        return $this->viande3;
    }

    function getSauce1() {
        return $this->sauce1;
    }

    function getSauce2() {
        return $this->sauce2;
    }

    function setIdTacosClient($idTacosClient) {
        $this->idTacosClient = $idTacosClient;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setViande1($viande1) {
        $this->viande1 = $viande1;
    }

    function setViande2($viande2) {
        $this->viande2 = $viande2;
    }

    function setViande3($viande3) {
        $this->viande3 = $viande3;
    }

    function setSauce1($sauce1) {
        $this->sauce1 = $sauce1;
    }

    function setSauce2($sauce2) {
        $this->sauce2 = $sauce2;
    }



}
