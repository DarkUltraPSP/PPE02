<?php

$tacos = TacosManager::findAllTacos();

$tailles = TailleManager::findAllTailles();
$viandes = ViandeManager::findAllViandes();
$sauces = SauceManager::findAllSauces();

$frites = FritesManager::findAllFrites();
$boissons = BoissonManager::findAllBoissons();

if (empty($_GET["typeProduit"]))
{
    ?>
<div class="divTitre">
    <h class="produits"> Nos produits :</h>
</div>
<div class="bloc-commande">
    <a href="Accueil.php?page=commander&typeProduit=Tacos" class="Choix">
        <div >
            <h> Nos Tacos </h>
        </div>
    </a>
    <a href="Accueil.php?page=commander&typeProduit=Frites" class="Choix">
        <div >
            <h> Nos Frites </h>
        </div>
    </a>
    <a href="Accueil.php?page=commander&typeProduit=Boissons" class="Choix">
        <div >
            <h> Les Boissons </h>
        </div>
    </a>
</div>
    <?php
}
else
{
    switch ($_GET["typeProduit"])
    {
        case ("Tacos"):
            if (empty($_SESSION["size"]) || empty($_SESSION["viande0"]) || empty($_SESSION["sauce0"]))
            {
                if (empty($_SESSION['size'])) //Affichage des differentes tailles
                {
    ?>
    <div class="divTitre">
        <h class="selectSize"> Selectionnez la taille de votre Tacos </h>
    </div>
    <form method="POST" action="Accueil.php?page=commander&typeProduit=Tacos">
        <div class="bloc-commande">
        <?php
                    foreach ($tailles as $taille)
                    {
            ?>
            <label for="<?php echo $taille->getIdTaille(); ?>">
                <div class="tacosSize">
                    <h class="SizeTacos"><?php echo $taille->getNomTaille(); ?></h>
                    <h> <?php echo $taille->getDescriptionTaille(); ?></h>
                    <input type="radio" name="size" value="<?php echo $taille->getIdTaille(); ?>" id="<?php echo $taille->getIdTaille(); ?>" />
                </div>
            </label>
            <?php
                    }
        ?>
        </div>
        <div class ="validation">
            
            <a class="bouton" href="Accueil.php?page=commander"><button>Retour</button></a>
            <input class="bouton" type="submit" value="Valider"/>
        </div>
    </form>
    

    <?php
                }

                else if (!empty($_SESSION["size"]) && empty($_SESSION["viande0"])) //Affichage des differentes viandes
                {
    ?>
    <div class="divTitre">
        <form method="POST" action="Accueil.php?page=commander&typeProduit=Tacos">
        <input type="submit" name="retourSize" value="Retour"/>
        </form>
        <form method="POST" action="Accueil.php?page=commander">
            <input type="submit" name="delTacos" value="Annuler"/>
        </form>
        <?php 
                    if ($_SESSION["size"] == 1) 
                    {
        ?>
        <h class="selectSize"> Selectionnez <?php echo $_SESSION["size"] ?> viande</h>
        <?php
                    }
                    else
                    {
        ?>
        <h class="selectSize"> Selectionnez <?php echo $_SESSION["size"] ?> viandes</h>
        <?php
                    }
        ?>
    </div>
    <form method="POST" action="Accueil.php?page=commander&typeProduit=Tacos">
        <div class="bloc-commande">
            <?php
                    $i=0;
                    for ($index = 1; $index < $_SESSION["size"]+1; $index++) 
                    {
            ?>
            <div class="containerViande">
                <p class="numViande"> Viande n°<?php echo $index ?></p>
                </br>
                <div class="allViandes">
                <?php
                        foreach ($viandes as $viande)
                        {
                ?>
                <label for="<?php echo $i ?>">
                    <div class="viande">
                        <p><?php echo $viande->getNomViande() ?> </p>
                        <p><?php echo $viande->getDescriptionViande() ?></p>
                        <input type="checkbox" name="viandes[]" value="<?php echo $viande->getIdViande(); ?>" id="<?php echo $i; ?>"/>
                    </div>
                 </label>
                <?php
                            $i++;
                        }
               
                        ?> 
                </div>
            </div>
                <?php
                    }
            ?>
        </div>
        <div class="validation">
            <input class="bouton" type="submit" value="Valider"/>
        </div>
    </form>

    <?php   
                }

                else if (!empty($_SESSION["size"]) && !empty($_SESSION["viande0"])) //Affichage des differentes sauces
                {
                    $nbSauce = 0;
                    if ($_SESSION["size"] == 1)
                    {
                        $nbSauce = 1;
                    }
                    else
                    {
                        $nbSauce = 2;
                    }
                    
    ?>

<div class="divTitre">
    <form method="POST" action="Accueil.php?page=commander">
    <input type="submit" name="retourViande" value="Retour"/>
    </form>
    <form method="POST" action="Accueil.php?page=commander">
        <input type="submit" name="delTacos" value="Annuler"/>
    </form>
    <?php 
        if ($_SESSION["size"] == 1) 
        {
    ?>
    <h class="selectSize"> Selectionnez <?php echo $nbSauce ?> sauce</h>
    <?php
        }
        else
        {
    ?>
    <h class="selectSize"> Selectionnez <?php echo $nbSauce ?> sauces</h>
    <?php
        }
    ?>
</div>
<form method="POST" action="Accueil.php?page=commander&typeProduit=Tacos">
    <div class="bloc-commande">
            <?php
                    $i = 0;
                    for ($index1 = 0; $index1 < $nbSauce; $index1++) 
                    {
        ?>
        <div class="containerViande">
            <p> Sauce n°<?php echo $index1+1 ?></p>
            <?php
                        foreach ($sauces as $sauce)
                        {
                ?>
            <label for="<?php echo $i ?>">
                <div class="viande">
                    <p> <?php echo $sauce->getNomSauce() ?> </p>
                    <p> <?php echo $sauce->getDescriptionSauce() ?> </p>
                    <input type="hidden" name="nbSaucesMax" value="<?php echo $nbSauce ?>"/>
                    <input type="checkbox" name="sauces[]" value="<?php echo $sauce->getIdSauce(); ?>" id="<?php echo $i ?>"/>
                </div>
            </label>
            <?php
                            $i++;
                        }
            ?>
        </div>
            <?php
                    }
            ?>
    </div>
    <div class="validation">
        <input class="bouton" type="submit" value="Valider"/>
    </div>
</form>


<?php
                }
            }
            else //Recapitulatif avant de mettre dans un objet
            {
                ?>
<div class="recap">
    <p class="entete-recap"> Récapitulatif de la commande: </p>
    <?php
                    foreach ($tailles as $taille) //Recap taille tacos choisie
                    {
                        if ($taille->getIdTaille() == $_SESSION["size"])
                        {
    ?>
    <p> <?php echo $taille->getNomTaille();?>

    <?php
                        }
                    }

                    foreach ($viandes as $viande) //Recap viandes choisies
                    {
                        if ($viande->getIdViande() == $_SESSION["viande0"])
                        {
    ?>
    <p> <?php echo $viande->getNomViande(); ?> </p>
    <?php
                        }
                        if (!empty($_SESSION["viande1"]))
                        {
                            if ($viande->getIdViande() == $_SESSION["viande1"])
                            {
    ?>
    <p> <?php echo $viande->getNomViande(); ?> </p>
    <?php
                            }
                        }
                        if (!empty($_SESSION["viande2"]))
                        {
                            if ($viande->getIdViande() == $_SESSION["viande2"])
                            {
    ?>
    <p> <?php echo $viande->getNomViande(); ?> </p>
    <?php
                            }
                        }
                    }

                    foreach ($sauces as $sauce) //Recap des sauces choisies
                    {
                        if ($sauce->getIdSauce() == $_SESSION["sauce0"])
                        {
    ?>
    <p> <?php echo $sauce->getNomSauce(); ?> </p>
    <?php
                        }
                        if (!empty($_SESSION["sauce1"]))
                        {
                            if ($sauce->getIdSauce() == $_SESSION["sauce1"])
                            {
    ?>
    <p> <?php echo $sauce->getNomSauce(); ?> </p>
    <?php
                            }
                        }
                    }
                    ?>
</div>
<div class="confirmCommande">
    <form method="POST" action="Accueil.php?page=commander&typeProduit=Tacos">
        <input type="submit" name="retourSauce" value="Retour"/>
    </form>
    <form method="POST" action="Accueil.php?page=commander">
        <input type="submit" name="delTacos" value="Annuler"/>
    </form>
    <form method="POST" action="Accueil.php?page=commander">
        <input type="hidden" name="confirmationTacos" value="true"/>
        <input type="submit" value="Ajouter au panier"/>
    </form>
</div>

<?php
            }
            break;
            
        case ("Frites"):
            if (empty ($_SESSION["idFrites"]) || empty ($_SESSION["quantiteFrites"]))
            {
                if (empty ($_SESSION["idFrites"])) //Choix du type de frites
                {
?>
<form method="POST" action="Accueil.php?page=commander&typeProduit=Frites">
    <div class="bloc-commande">
        <?php
                    foreach ($frites as $frite)
                    {
        ?>
        <label for="<?php echo $frite->getIdFrites(); ?>">
            <div class="tacosSize">
                <h class="SizeTacos"><?php echo $frite->getNomFrites(); ?></h>
                <h> <?php echo $frite->getPrixFrites(); ?>€</h>
                <input type="radio" name="idFrites" value="<?php echo $frite->getIdFrites(); ?>" id="<?php echo $frite->getIdFrites(); ?>" />
            </div>
        </label>
        <?php
                    }
        ?>
    </div>
    <input type="submit" value="Valider"/>
</form>
<?php
                }
                else //Choix de la quantite (5 max)
                {
?>
<p> Combien en voulez vous ? </p>
<form method="POST" action="Accueil.php?page=commander&typeProduit=Frites">
    <input type="number" name="quantiteFrites" value="1" min="1" max="5"/>
    <input type="submit" value="Valider"/>
</form>
<?php
                } 
            }
            else //Confirmation ou annulation de l'ajout au panier
            {
                foreach ($frites as $frite)
                {
                    if ($frite->getIdFrites() == $_SESSION["idFrites"])
                    {
?>
<p> Vous allez ajouter <?php echo $_SESSION["quantiteFrites"]." ".$frite->getNomFrites(); ?> a votre panier </p>
<form method="POST" action="Accueil.php?page=commander">
    <input type="hidden" name="confirmationFrites" value="true"/>
    <input type="submit" value="Ajouter au panier"/>
</form>
<form method="POST" action="Accueil.php?page=commander">
    <input type="submit" name="delFrites" value="Annuler"/>
</form>
<?php
                    }
                }
            }
            
            break;
        
        case ("Boissons"):
            if (empty ($_SESSION["idBoisson"]) || empty ($_SESSION["quantiteBoisson"]))
            {
                if (empty($_SESSION["idBoisson"]))//Choix de la boisson
                {
?>
<form method="POST" action="Accueil.php?page=commander&typeProduit=Boissons">
    <div class="bloc-commande">
        <?php
                    foreach ($boissons as $boisson)
                    {
        ?>
        <label for="<?php echo $boisson->getIdBoisson(); ?>">
            <div class="tacosSize">
                <h class="SizeTacos"><?php echo $boisson->getNomBoisson(); ?></h>
                <h> <?php echo $boisson->getPrixBoisson(); ?>€</h>
                <input type="radio" name="idBoisson" value="<?php echo $boisson->getIdBoisson(); ?>" id="<?php echo $boisson->getIdBoisson(); ?>" />
            </div>
        </label>
        <?php
                    }
        ?>
    </div>
    <input type="submit" value="Valider"/>
</form>
<?php
                }
                else //Choix de la quantite (5 max)
                {
?>
<p> Combien en voulez vous ? </p>
<form method="POST" action="Accueil.php?page=commander&typeProduit=Boissons">
    <input type="number" name="quantiteBoisson" value="1" min="1" max="5"/>
    <input type="submit" value="Valider"/>
</form>
<?php
                }
            }
            
            else //Confirmation ou annulation de l'ajout au panier
            {
                foreach ($boissons as $boisson)
                {
                    if ($boisson->getIdBoisson() == $_SESSION["idBoisson"])
                    {
?>
<p> Vous allez ajouter <?php echo $_SESSION["quantiteBoisson"]." ".$boisson->getNomBoisson(); ?> a votre panier </p>
<form method="POST" action="Accueil.php?page=commander">
    <input type="hidden" name="confirmationBoisson" value="true"/>
    <input type="submit" value="Ajouter au panier"/>
</form>
<form method="POST" action="Accueil.php?page=commander">
    <input type="submit" name="delBoisson" value="Annuler"/>
</form>
<?php
                    }
                }
            }
            break;
    }
}