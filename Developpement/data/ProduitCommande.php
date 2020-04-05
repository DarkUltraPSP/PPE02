<?php

class ProduitCommande
{
    private $idProduit;
    private $idCommande;
    
    function getIdProduit() {
        return $this->idProduit;
    }

    function getIdCommande() {
        return $this->idCommande;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    function setIdCommande($idCommande) {
        $this->idCommande = $idCommande;
    }

}
