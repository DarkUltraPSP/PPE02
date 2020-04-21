<?php
$produits = ProduitManager::findAllProduits();
$types = TypeProduitManager::findAllType();


?>
<?php
if (empty($_SESSION["size"]))
{
?>
<div class="phraseChoix">
    <h> Sélectionnez la taille de votre tacos :</h>
</div>
<form method="POST" action="Accueil.php?page=commander">

    <div class="produit">
<?php
    foreach ($produits as $prod)
    {
        if ($prod->getIdType() == 1)
        {
            ?>
        <div class="displayProduit">
            <div class="nomProduits">
            <?php
            echo $prod->getNomProduit();
            ?>
            </div>
            <div class="DescriptionProduits">
            <?php
            echo $prod->getDescription();
            ?> 
            </div>
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
<?php
}
else 
{
    switch ($_SESSION["size"])
    {
        case 1:
            ?>
<form method="POST" action="Accueil.php?page=commander">

    <div class="produit">
<?php
            foreach ($produits as $prod)
            {
                if ($prod->getIdType() == 2)
                {
                    ?>
                    <div class="nomProduits">
                        <?php
                        echo $prod->getNomProduit();
                        ?>
                    </div>
                    <div class="DescriptionProduits">
                        <?php
                        echo $prod->getDescription();
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
    </div>
</form>
        <?php
            break;
    }
}
print_r($_SESSION);