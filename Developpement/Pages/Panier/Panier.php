<?php
$panier = PanierManager::findAllPaniers();
$tacosClient = TacosClientManager::findAllTacosClient();
$fritesClient = FritesPanierManager::findAllFritesPanier();
$boissonClient = BoissonPanierManager::findAllBoissonsPanier();

$tacos = TacosManager::findAllTacos();
$viandes = ViandeManager::findAllViandes();
$sauces = SauceManager::findAllSauces();
$frites = FritesManager::findAllFrites();
$boissons = BoissonManager::findAllBoissons();

if (!empty($_SESSION["tacos"]))
{
    $tacosClient = $_SESSION["tacos"];
}
if (!empty($_SESSION["frites"]))
{
    $fritesClient = $_SESSION["frites"];
}
if (!empty($_SESSION["boissons"]))
{
    $boissonClient = $_SESSION["boissons"];
}
?>
<p> Votre Panier : </p>

<div class="tacosCommande">
    <?php
    foreach ($tacosClient as $tClient)
    {
    ?>
    <div>
    <?php
        foreach ($tacos as $size) //Afficher la taille du tacos
        {
            if ($size->getIdTacos() == $tClient->getSize())
            {
    ?>
        <div class="tailleTacos">
            <p> <?php echo $size->getNomTacos(); ?> </p>
        </div>
    <?php
            }
        }
        foreach ($viandes as $viande) //Afficher les viandes du tacos
        {
            if ($viande->getIdViande() == $tClient->getViande1() || $viande->getIdViande() == $tClient->getViande2() || $viande->getIdViande() == $tClient->getViande3())
            {
        ?>
        <div class="garniture">
            <p><?php echo $viande->getNomViande(); ?></p>
        </div>
        <?php
            }
        }
        foreach ($sauces as $sauce)
        {
            if ($sauce->getIdSauce() == $tClient->getSauce1() || $sauce->getIdSauce() == $tClient->getSauce2())
            {
                ?>
        <div class="garniture">
            <p> <?php echo $sauce->getNomSauce(); ?> </p>
        </div>
                <?php
            }
        }
        ?>
    </div>
    <?php
    }
    ?>
</div>

<div class="fritesCommande">
    <?php
    foreach ($fritesClient as $fClient)
    {
        foreach ($frites as $frite)
        {
            if ($frite->getIdFrites() == $fClient->getIdFrites())
            {
    ?>
    <div class="frites">
        <p> <?php echo $frite->getNomFrites(); ?> </p>
    </div>
    <?php
            }
        }
    }
    ?>
</div>

<div class="boissonCommande">
    <?php
    foreach ($boissonClient as $bClient)
    {
        foreach ($boissons as $boisson)
        {
            if ($boisson->getIdBoisson() == $bClient->getIdBoisson())
            {
    ?>
    <div class="boisson">
        <p> <?php echo $boisson->getNomBoisson(); ?> </p>
    </div>
    <?php
            }
        }
    }
    ?>
</div>