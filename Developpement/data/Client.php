<?php

class Client 
{
    private $idClient;
    private $nom;
    private $prenom;
    private $adresse;
    
    function getIdClient() {
        return $this->idClient;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

}
