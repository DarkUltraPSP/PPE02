<link rel="stylesheet" type="text/css" href="Inscription/Inscription.css" media="all"/>
<div class="contour">
    <p class="titre">Inscription</p>
    <form method="POST" action="insertUser.php">
<div class="bloc">
        <input type="text" name="prenom" placeholder="Prénom" required/>
        <input type="text" name="nom" placeholder="Nom" required/>
        
        <input type="password" name="password" placeholder="Mot de passe" required/>
        <input type="password" name="password" placeholder="Confirmer le mot de passe" required/>
        
        </br>
        
        <input type="text" name="adresse" placeholder="Adresse" required/>
        <input type="mail" name="mail" placeholder="Mail" required/>
</div>
    <input class="inscrire" type="submit" value="S'inscrire" name="inscription"/>
    </form>
</div>