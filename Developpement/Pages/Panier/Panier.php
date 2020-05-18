<?php
$panier = PanierManager::findAllPaniers();
$tacosClient = TacosClientManager::findAllTacosClient();
$fritesClient = FritesPanierManager::findAllFritesPanier();
$boissonClient = BoissonPanierManager::findAllBoissonsPanier();
$prixTotal = 0.0;

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

<table>
    <tr>
        <td> Produits </td>
        <td> Quantite </td>
        <td> Prix </td>
    </tr>
    <?php
    $tacosCpt = 0;
    foreach ($tacosClient as $tClient)
    {
    ?>
    <tr class="tacos">
        <td>
    <?php
        foreach ($tacos as $size) //Afficher la taille du tacos
        {
            if ($size->getIdTacos() == $tClient->getSize())
            {
                echo $size->getNomTacos();
                echo '<br>';
            }
        }
        foreach ($viandes as $viande) //Afficher les viandes du tacos
        {
            if ($viande->getIdViande() == $tClient->getViande1() || $viande->getIdViande() == $tClient->getViande2() || $viande->getIdViande() == $tClient->getViande3())
            {
                echo $viande->getNomViande().", ";
            }
        }
        foreach ($sauces as $sauce)
        {
            if ($sauce->getIdSauce() == $tClient->getSauce1() || $sauce->getIdSauce() == $tClient->getSauce2())
            {
                echo $sauce->getNomSauce().", ";
            }
        }
        ?>
        </td>
        <td>
            1
        </td>
        <td>
            <?php
            foreach ($tacos as $size)
            {
                if ($size->getIdTacos() == $tClient->getSize())
                {
                    $prixSize = $size->getPrixTacos();
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
    ?>
    <tr>
        <td> Frites </td>
    </tr>
    <?php
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
    ?>
    <tr>
        <td> Boissons </td>
    </tr>
    <tbody>
    <?php
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
    ?>
    <tr>
        <td>Prix Total</td>
        <td></td>
        <td> <?php echo $prixTotal." €" ?></td>
    </tr>
</table>
<a href="Accueil.php?page=InfoClient"><button>Valider ma commande</button></a>