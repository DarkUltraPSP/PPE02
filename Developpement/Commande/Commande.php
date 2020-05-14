<?php

$tacos = TacosManager::findAllTacos();
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
            if (empty($_SESSION['size']))
            {
?>
<div class="divTitre">
    <h class="selectSize"> Selectionnez la taille de votre Tacos </h>
</div>
<form method="POST" action="Accueil.php?page=commander&typeProduit=Tacos">
    <div class="bloc-commande">
    <?php
                foreach ($tacos as $t)
                {
        ?>
        <label for="<?php echo $t->getIdTacos(); ?>">
            <div class="tacosSize">
                <h class="SizeTacos"><?php echo $t->getNomTacos(); ?></h>
                <h> <?php echo $t->getDescriptionTacos(); ?></h>
                <input type="radio" name="size" value="<?php echo $t->getIdTacos(); ?>" id="<?php echo $t->getIdTacos(); ?>" />
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
            else if (!empty($_SESSION["size"]) && empty($_SESSION["viande1"]))
            {
?>
<form method="POST" action="Accueil.php?page=commander&typeProduit=Tacos">
    <div class="bloc-commande">
        <?php
        $i=0;
                for ($index = 1; $index < $_SESSION["size"]+1; $index++) 
                {
                    ?>
        <div class="containerViande">
            <p> Viande n°<?php echo $index ?></p>
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
            <?php
                }
        ?>
    </div>
    <input type="submit" value="Valider"/>
</form>
<?php   
            }
            else if (!empty($_SESSION["size"]) && !empty($_SESSION["viande1"]))
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
<form method="POST" action="Accueil.php?page=commander&typeProduit=Tacos">
    <div class="bloc-commande">
        <?php
        $i = 0;
        for ($index1 = 0; $index1 < $nbSauce; $index1++) 
        {
        ?>
        <div class="containerViande">
            <p> Sauce n°<?php echo $index1 ?></p>
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
    <input type="submit" value="Valider"/>
</form>
<?php
            }
            break;
            
        case ("Frites"):
            break;
        
        case ("Boisson"):
            break;
    }
}