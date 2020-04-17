<?php
include_once 'dataManager/databaseLinker.php';
include_once 'dataManager/ClientManager.php';
include_once 'dataManager/CommandeManager.php';
include_once 'dataManager/ProduitManager.php';
include_once 'dataManager/ProduitCommandeManager.php';
include_once 'dataManager/TypeProduitManager.php';

include_once 'data/Client.php';
include_once 'data/Commande.php';
include_once 'data/Produit.php';
include_once 'data/TypeProduit.php';
include_once 'data/ProduitCommande.php';

$clients = ClientManager::findAllClients();
$commandes = CommandeManager::findAllCommandes();
$produits = ProduitManager::findAllProduits();
$produitsCommande = ProduitCommandeManager::findAllProduits();
$types = TypeProduitManager::findAllType();

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
        <link rel="stylesheet" type="text/css" href="Commande/Commande.css" media="all"/>
            <?php
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

                <form class="optn" method="GET" action="Accueil.php">
                    <input type="hidden" name="page" value="connexion" id="btn"/>
                    <input type="submit" value="Connectez-vous" class="btn"/>
                </form>
                <form class="optn" method="GET" action="Accueil.php">
                    <input type="hidden" name="page" value="inscription" id="btn"/>
                    <input type="submit"  value="Inscrivez-vous" class="btn"/>
                </form>
                
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