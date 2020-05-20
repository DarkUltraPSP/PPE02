<?php
?>
<div class="container-InfoClient">
    <div>
        Veuillez saisir un nom, un prénom et une adresse de livraison :
    </div>
    <form method="POST" action="Accueil.php?page=infoClient">
        <div class="conatiner-info">
            <input type="hidden" name="prixTotal" value="<?php echo $_POST["prixTotal"] ?>" />
            <input type="text" name="nom" placeholder="Nom" required/>
            <input type="text" name="prenom" placeholder="Prenom" required/>
            <input type="text" name="adresse" placeholder="Adresse" required/>
        </div>
        <input type="submit" name="envoieCommande" value="Finaliser la commande"/>
    </form>
</div>
<?php