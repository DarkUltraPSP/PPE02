<?php

class TacosClientPanier 
{
    private $idPanier;
    private $idTacosClient;
    
    function getIdPanier() {
        return $this->idPanier;
    }

    function getIdTacosClient() {
        return $this->idTacosClient;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

    function setIdTacosClient($idTacosClient) {
        $this->idTacosClient = $idTacosClient;
    }

}
