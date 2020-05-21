<?php
?>
<p class="lastEtape">Dernière étape de votre commande!</p>
<div class="container-InfoClient">
    
    <div class="phrase">
        Veuillez renseigner les champs suivants afin de finaliser votre commande :
    </div>
    </br>
    <div class="casesClient" 
        <form method="POST" action="Accueil.php?page=infoClient">
            <div class="container-info">
                <input type="hidden" name="prixTotal" value="<?php echo $_POST["prixTotal"] ?>" />
                <input class="nom" type="text" name="nom" placeholder="Nom" required/>
                <input class="prenom" type="text" name="prenom" placeholder="Prenom" required/>
                <input class="adresse" type="text" name="adresse" placeholder="Adresse" required/>
            </div>
            <input class="bouton" type="submit" name="envoieCommande" value="Finaliser la commande"/>
        </form>
    </div>
</div>