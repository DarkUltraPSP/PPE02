<?php
$tailles = TailleManager::findAllTailles();
$viandes = ViandeManager::findAllViandes();
$sauces = SauceManager::findAllSauces();

$frites = FritesManager::findAllFrites();
$boissons = BoissonManager::findAllBoissons();

?>
<div class="AllProduits">
    <div class="Tailles">
        <div class="nomCategorie"> Les Tailles </div>
<?php
foreach ($tailles as $taille)
{
    ?>
        <div class="singleTaille">
            <div class="desc">
                <div class="nomProduit"> <?php echo $taille->getNomTaille(); ?></div>
                <div class="descProduit"> <?php echo $taille->getDescriptionTaille(); ?> </div>
            </div>
                <div class="prix"> <?php echo $taille->getPrixTaille()."€"; ?> </div>
        </div>
    <?php
}
?>
    </div>
    
    <div class="Garniture">
        <div class="Categorie">
            <div class="nomCategorie"> Les Viandes </div>
    <?php
foreach ($viandes as $viande)
{
    ?>
            <div class="singleViande">
                <div class="nomProduit"> <?php echo $viande->getNomViande(); ?></div>
                <div class="descProduit"> <?php echo $viande->getDescriptionViande(); ?></div>
            </div>
    <?php
}
?>
        </div>
        <div class="Categorie">
            <div class="nomCategorie"> Les Sauces </div>
    <?php

foreach ($sauces as $sauce)
{
    ?>
            <div class="singleSauce">
                <div class="nomProduit"> <?php echo $sauce->getNomSauce(); ?> </div>
                <div class="descProduit"> <?php echo $sauce->getDescriptionSauce(); ?> </div>
            </div>
    <?php
}
?>
        </div>
    <?php

?>
    </div>
    
    <div class="Supplement">
        <div class="Categorie">
            <div class="nomCategorie"> Les Frites </div>
    <?php
foreach ($frites as $frite)
{
    ?>
            <div class="singleSupp">
                <div class="nomProduit suppNom"> <?php echo $frite->getNomFrites(); ?> </div>
                <div class="prix"> <?php echo $frite->getPrixFrites()."€"; ?> </div>
            </div>
    <?php
}
?>
        </div>
        <div class="Categorie">
            <div class="nomCategorie"> Les Boissons </div>
    <?php

foreach ($boissons as $boisson)
{
    ?>
            <div class="singleSupp">
                <div class="nomProduit suppNom"> <?php echo $boisson->getNomBoisson() ?> </div>
                <div class="prix"> <?php echo $boisson->getPrixBoisson()."€" ?> </div>
            </div>
    <?php
}

?>
        </div>
    </div>
</div>