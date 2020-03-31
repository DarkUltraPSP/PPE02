<?php

class TypeProduit 
{
    private $idTypeProduit;
    private $libelle;
    
    function getIdTypeProduit() {
        return $this->idTypeProduit;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setIdTypeProduit($idTypeProduit) {
        $this->idTypeProduit = $idTypeProduit;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

}
