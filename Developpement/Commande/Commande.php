<?php
$produits = ProduitManager::findAllProduits();
$types = TypeProduitManager::findAllType();

?>
    <form method="POST" action="Accueil.php">
        <div class="tacos">
            <link href="Commande.css" rel="stylesheet" type="text/css"/>
    <?php
    foreach ($produits as $prod)
    {
        if ($prod->getIdType() == 1)
        {
                ?>
        <div class="displayProd">
            <?php echo $prod->getNomProduit() ?> 
            <input type="radio" name="tacosSize" value="<?php echo $prod->getIdProduit() ?>" id="<?php echo $prod->getIdProduit() ?>" class="check"/>
            <label for="<?php echo $prod->getIdProduit() ?>"> Selectionner </label>
        </div>
                <?php
        }
    }
    ?>
        </div>
        <input type="submit" value="Valider"/>
        
    </form>