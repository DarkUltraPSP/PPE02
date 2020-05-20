<?php
$panier = PanierManager::findAllPaniers();
$tacos = TacosManager::findAllTacos();
$fritesClient = FritesPanierManager::findAllFritesPanier();
$boissonClient = BoissonPanierManager::findAllBoissonsPanier();
$prixTotal = 0.0;

$tailles = TailleManager::findAllTailles();
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
<p class="titre"> Votre Panier : </p>

<table class="liste">
    <tr>
        <td> Produits </td>
        <td> Quantite </td>
        <td> Prix </td>
    </tr>
    <tr class="titreTab">
        <td> Tacos :</td>
    </tr>
    <?php
    $tacosCpt = 0;
if (!empty($tacosClient))
{
    foreach ($tacosClient as $tClient)
    {
    ?>
    <tr class="tacos">
        <td>
    <?php
        foreach ($tailles as $size) //Afficher la taille du tacos
        {
            if ($size->getIdTaille() == $tClient->getIdTaille())
            {
                echo $size->getNomTaille();
                echo '<br>';
            }
        }
        foreach ($viandes as $viande) //Afficher les viandes du tacos
        {
            if ($viande->getIdViande() == $tClient->getIdViande1() || $viande->getIdViande() == $tClient->getIdViande2() || $viande->getIdViande() == $tClient->getIdViande3())
            {
                echo $viande->getNomViande().", ";
            }
        }
        foreach ($sauces as $sauce)
        {
            if ($sauce->getIdSauce() == $tClient->getIdSauce1() || $sauce->getIdSauce() == $tClient->getIdSauce2())
            {
                echo $sauce->getNomSauce().", ";
            }
        }
        ?>
        </td>
        <td> <?php //Quantite tacos ?>
            1
        </td>
        <td> <?php //Prix du Tacos ?>
            
            <?php
            foreach ($tailles as $size)
            {
                if ($size->getIdTaille() == $tClient->getIdTaille())
                {
                    $prixSize = $size->getPrixTaille();
                    $prixTotal += $prixSize;
                    echo $prixSize." €";
                }
            }
            ?>
        </td>
        <td>
            <form method="POST" action="Accueil.php?page=panier">
                <input type="hidden" name="arrayPosTacos" value="<?php echo array_search($tClient, $tacosClient); ?>"/>
                <label for="<?php echo array_search($tClient, $tacosClient) ?>"> <i class="fas fa-times"></i> </label>
                <input type="submit" name="delTacosPanier" value="Supprimer" id="<?php echo array_search($tClient, $tacosClient); ?>"/>
            </form>
        </td>
    </tr>
    <?php
    $tacosCpt++;
    }
}
    ?>
    <tr>
        <td> Frites :</td>
    </tr>
    <?php
if (!empty($fritesClient))
{
    foreach ($fritesClient as $fClient)
    {
        foreach ($frites as $frite)
        {
            if ($frite->getIdFrites() == $fClient->getIdFrites())
            {
                $prixQuantiteFrites = $frite->getPrixFrites()*$fClient->getQuantite();
                $prixTotal += $prixQuantiteFrites;
    ?>
    <tr class="frites">
        <td> <?php echo $frite->getNomFrites(); ?> </td>
        <td> <?php echo $fClient->getQuantite(); ?></td>
        <td> <?php echo $prixQuantiteFrites; ?> €</td>
        <td>
            <form method="POST" action="Accueil.php?page=panier">
                    <input type="hidden" name="arrayPosFrites" value="<?php echo array_search($fClient, $fritesClient); ?>"/>
                    <label for="<?php echo array_search($fClient, $fritesClient) ?>"> <i class="fas fa-times"></i> </label>
                    <input type="submit" name="delFritesPanier" value="Supprimer" id="<?php echo array_search($fClient, $fritesClient); ?>"/>
            </form>
        </td>
    </tr>
    <?php
            }
        }
    }
}
    ?>
    <tr>
        <td> Boissons :</td>
    </tr>
    <tbody>
    <?php
if (!empty($boissonClient))
{
    foreach ($boissonClient as $bClient)
    {
        foreach ($boissons as $boisson)
        {
            if ($boisson->getIdBoisson() == $bClient->getIdBoisson())
            {
                $prixQuantiteBoisson = $boisson->getPrixBoisson()*$bClient->getQuantite();
                $prixTotal += $prixQuantiteBoisson;
    ?>
    <tr class="boisson">
        <td> <?php echo $boisson->getNomBoisson(); ?> </td>
        <td> <?php echo $bClient->getQuantite(); ?> </td>
        <td> <?php echo $prixQuantiteBoisson; ?> € </td>
        <td>
            <form method="POST" action="Accueil.php?page=panier">
                    <input type="hidden" name="arrayPosBoisson" value="<?php echo array_search($bClient, $boissonClient); ?>"/>
                    <label for="<?php echo array_search($bClient, $boissonClient) ?>"> <i class="fas fa-times"></i> </label>
                    <input type="submit" name="delBoissonPanier" value="Supprimer" id="<?php echo array_search($bClient, $boissonClient); ?>"/>
            </form>
        </td>
    </tr>
    <?php
            }
        }
    }
}
    ?>
    <tr>
        <td>Prix Total</td>
        <td></td>
        <td> <?php echo $prixTotal." €" ?></td>
    </tr>
</table>
<?php
if (isset($_SESSION["tacos"]))
{
?>
<div class="validation">
    <form method="POST" action="Accueil.php?page=infoClient">
        <input type="hidden" name="prixTotal" value="<?php echo $prixTotal ?>"/>
        <input class="validCommande" type="submit" name="validCommande" value="Valider ma commande"/>
    </form>
</div>
<?php
}
else if (isset ($_SESSION["frites"]) || isset ($_SESSION["boisson"]))
{
?>
<div class="erreurPanier"> Vous devez commander au moins 1 tacos pour commander des frites et/ou une boisson</div>
<?php
}
else if (!isset($_SESSION["tacos"]))
{
?>
<div class="emptyCart">Votre panier est vide</div>
<?php
}
?>