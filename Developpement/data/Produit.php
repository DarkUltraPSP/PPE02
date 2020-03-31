<?php

class Produit 
{
    private $idProduit;
    private $nomProduit;
    private $prixProduit;
    private $description;
    private $pathPhoto;
    private $idType;
    
    function getIdProduit() {
        return $this->idProduit;
    }

    function getNomProduit() {
        return $this->nomProduit;
    }

    function getPrixProduit() {
        return $this->prixProduit;
    }

    function getDescription() {
        return $this->description;
    }

    function getPathPhoto() {
        return $this->pathPhoto;
    }

    function getIdType() {
        return $this->idType;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    function setNomProduit($nomProduit) {
        $this->nomProduit = $nomProduit;
    }

    function setPrixProduit($prixProduit) {
        $this->prixProduit = $prixProduit;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setPathPhoto($pathPhoto) {
        $this->pathPhoto = $pathPhoto;
    }

    function setIdType($idType) {
        $this->idType = $idType;
    }

}
