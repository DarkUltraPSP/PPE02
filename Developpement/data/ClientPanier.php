<?php

class ClientPanier 
{
    private $idClient;
    private $idPanier;
    
    function getIdClient() {
        return $this->idClient;
    }

    function getIdPanier() {
        return $this->idPanier;
    }

    function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    function setIdPanier($idPanier) {
        $this->idPanier = $idPanier;
    }

}
