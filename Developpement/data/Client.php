<?php

class Client 
{
    private $idClient;
    private $nomClient;
    private $prenomClient;
    private $adresse;
    private $password;
    private $mail;
    
    function getIdClient() {
        return $this->idClient;
    }

    function getNomClient() {
        return $this->nomClient;
    }

    function getPrenomClient() {
        return $this->prenomClient;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getPassword() {
        return $this->password;
    }

    function getMail() {
        return $this->mail;
    }

    function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    function setNomClient($nomClient) {
        $this->nomClient = $nomClient;
    }

    function setPrenomClient($prenomClient) {
        $this->prenomClient = $prenomClient;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

}
