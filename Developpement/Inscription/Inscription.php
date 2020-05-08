<?php
    $bdd = new PDO("mysql:host=localhost;dbname=PPE02","root","root");
    
?>
<link rel="stylesheet" type="text/css" href="Inscription/Inscription.css" media="all"/>
<div align="center">
    <h2 class="titre">
        Inscription
    </h2>
    <form method="POST" action="insertUser.php">
        </br></br>
    <table >
        <tr align="center">
            <td align="right">
                <label for ="prenom"> Prénom :</label>
            </td>
            <td>
                <input type="text" name="prenom" placeholder="Prénom" required/>
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for ="nom"> Nom :</label>
            </td>
            <td>
                <input type="text" name="nom" placeholder="Nom" required/>
            </td>
        </tr>
        <tr>
            <td align="right"> 
                <label for ="password"> Mot de passe :</label>
            </td>
            <td>
                <input type="password" name="password" placeholder="Mot de passe" required/>
            </td>
        </tr>
        <tr>
            <td align="right">     
                <label for ="prenom"> Confirmation du mot de passe :</label>
            </td>
            <td>
                <input type="password" name="password" placeholder="Confirmer votre mdp" required/>
            </td>
        </tr>
        <tr>
            <td align="right">  
                <label for ="adresse"> Adresse :</label>
            </td>
            <td>
                <input type="text" name="adresse" placeholder="Adresse" required/>
            </td>
        </tr>
        <tr>
            <td align="right">
                <label for ="mail"> Mail :</label>
            </td>
            <td>
                <input type="mail" name="mail" placeholder="Mail" required/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td align="center">
            <input class="inscrire" type="submit" value="S'inscrire" name="inscription"/>
            </td>
        </tr>
    </table>
    </form>
</div>