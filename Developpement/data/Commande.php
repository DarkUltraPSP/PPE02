<?php

class Commande 
{
    private $idCommande;
    private $dateCommande;
    private $quantite;
    private $idClient;
    
    function getIdCommande() {
        return $this->idCommande;
    }

    function getDateCommande() {
        return $this->dateCommande;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getIdClient() {
        return $this->idClient;
    }

    function setIdCommande($idCommande) {
        $this->idCommande = $idCommande;
    }

    function setDateCommande($dateCommande) {
        $this->dateCommande = $dateCommande;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

}
