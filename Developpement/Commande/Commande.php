<?php
$produits = ProduitManager::findAllProduits();
$types = TypeProduitManager::findAllType();

if (empty($_GET['idType']))
{
    ?>
<h> Nos produits </h>

    <?php
    foreach ($types as $type)
    {
        if ($type->getIdTypeProduit() != 2 && $type->getIdTypeProduit() != 3)
        {
    ?>
<div>
    <a href="Accueil.php?page=commander&idType=<?php echo $type->getIdTypeProduit(); ?>"> Nos <?php echo $type->getLibelle(); ?> </a>
</div>
    <?php
        }
    }
}
else
{
    if ($_GET['idType'] == 1)
    {
        ?>
<form method="POST" action="Accueil.php?page=commander&idType=2">
<?php
        foreach ($produits as $prod)
        {
            if ($prod->getIdType() == $_GET['idType'])
            {
                ?>
    <div>
    <?php
                echo $prod->getNomProduit();
                echo $prod->getDescription();
                echo $prod->getPrixProduit()."€";
                ?>
    <input type="radio" value="<?php echo $prod->getIdProduit(); ?>" name="produit" id="<?php echo $prod->getIdProduit() ?>"/>
    <label for="<?php echo $prod->getIdProduit() ?>"> Sélectionner </label>
    </div>
    <?php
            }
        }
        ?>
    <input type="submit" value="Etape suivante"/>
</form>
<?php
    }
    else
    {
        ?>
<form method="POST" action="Accueil.php?page=commander&idType=2">
<?php
        foreach ($produits as $prod)
        {
            if ($prod->getIdType() == $_GET['idType'])
            {
                ?>
    <div>
    <?php
                echo $prod->getNomProduit();
                echo $prod->getDescription();
                if ($prod->getPrixProduit() != 0)
                {
                    echo $prod->getPrixProduit()."€";
                }
                ?>
        <input type="radio" value="<?php echo $prod->getIdProduit(); ?>" name="produit" id="<?php echo $prod->getIdProduit() ?>"/>
        <label for="<?php echo $prod->getIdProduit() ?>"> Sélectionner </label>
    </div>
    <?php
            }
        }
        ?>
    <input type="submit" value="Etape suivante"/>
</form>
<?php
    }
}