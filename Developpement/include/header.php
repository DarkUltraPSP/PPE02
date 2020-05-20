<?php

include_once 'data/Boisson.php';
include_once 'data/BoissonPanier.php';
include_once 'data/Client.php';
include_once 'data/ClientPanier.php';
include_once 'data/Frites.php';
include_once 'data/FritesPanier.php';
include_once 'data/Panier.php';
include_once 'data/Tacos.php';
include_once 'data/TacosPanier.php';
include_once 'data/Sauce.php';
include_once 'data/Viande.php';
include_once 'data/Taille.php';

include_once 'dataManager/BoissonManager.php';
include_once 'dataManager/BoissonPanierManager.php';
include_once 'dataManager/ClientManager.php';
include_once 'dataManager/ClientPanierManager.php';
include_once 'dataManager/FritesManager.php';
include_once 'dataManager/FritesPanierManager.php';
include_once 'dataManager/PanierManager.php';
include_once 'dataManager/TacosManager.php';
include_once 'dataManager/TacosPanierManager.php';
include_once 'dataManager/SauceManager.php';
include_once 'dataManager/ViandeManager.php';
include_once 'dataManager/TailleManager.php';

include_once 'dataManager/databaseLinker.php';

if (!isset($_SESSION))
{
    session_name("Users");
    session_start();
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Tacos of all time</title>
        <link rel="stylesheet" type="text/css" href="css/header.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/Organisation.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/footer.css" media="all"/>
        <?php
        if (!empty($_GET['page']))
        {
            switch ($_GET['page'])
            {
                case 'commander':
        ?>
        <link rel="stylesheet" type="text/css" href="Pages/Commande/Commande.css" media="all"/>
        <?php
                    break;
                case 'panier':
        ?>
        <link rel="stylesheet" type="text/css" href="Pages/Panier/panier" media="all"/>
        <?php
                    break;
                case 'infoClient':
        ?>
        <link rel="stylesheet" type="text/css" href="Pages/InfoClient/InfoClient.css" media="all"/>
        <?php
                    break;
                case 'contact':
        ?>
        <link rel="stylesheet" type="text/css" href="Pages/Contact/contact.css" media="all"/>
        <?php
                    break;

            }
        }
        ?>
        
        <link rel="stylesheet" href="https://kit.fontawesome.com/92920db574.js" />
        <script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/ico" href="image/tacos.ico" />
    </head>
    <body>
    <header>
        <div class="banniere">
            <div class="lateral"> </div>
            <div class="nomResto">
                
                <a href="Accueil.php" class="toat"> TOAT </a>
                <a href="Accueil.php" class="toatFull"> Tacos Of All Time </a>
                
            </div>
            <div class="lateral">
                <div class="cart">
                    <a href="Accueil.php?page=panier"> Votre panier <i class="fas fa-shopping-cart"></i> </a>
                </div>
            </div>
        </div>
    </header>
        
        <div class="Organisation">
            
            <div class="menu">
                
                <div class="indicator">
                    <i class="fas fa-bars dropdown"></i>
                </div>
                
                <div class="boutons-menu">
                    
                    <form method="GET" action="Accueil.php">
                        <input type="hidden" name="page" value="carte"/>
                        <input type="submit" value="La Carte" id="menu-btn" />
                    </form>
                    
                    <form method="GET" action="Accueil.php">
                        <input type="hidden" name="page" value="commander"/>
                        <input type="submit" value="Commander" id="menu-btn" />
                    </form>

                    <form method="GET" action="Accueil.php">
                        <input type="hidden" name="page" value="contact"/>
                        <input type="submit" value="Nous contacter" id="menu-btn" />
                    </form>
                    
                </div>
            </div>
            
            <div class="displayVue">
                <div class="content">