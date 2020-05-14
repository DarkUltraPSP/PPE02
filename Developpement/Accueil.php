<?php
include_once 'include/header.php';

if (!empty ($_GET["destroy"]))
{
    if ($_GET["destroy"] == true)
    {
        session_destroy();
        header ("Location: Accueil.php");
    }
}

if (!empty ($_GET))
{
    
    switch ($_GET['page'])
    {
        case 'commander':
            include_once 'Commande/CommandeController.php';
            $commande = new CommandeController();
            $commande->includeView();
            if (!empty($_POST["size"]))
            {
                $commande->size($_POST["size"]);
                $commande->refresh();
            }
            if (!empty($_POST["viandes"]))
            {
                if (count($_POST["viandes"]) == $_SESSION["size"])
                {
                    $commande->setViandes($_POST["viandes"]);
                    $commande->refresh();
                }
                else
                {
?>
<div>
    <p> ERREUR ! </p>
    <p> Vous n'avez pas saisi le bon nombre de viandes </p>
</div>
<?php
                }
            }
            if (!empty($_POST["sauces"]))
            {
                if (count($_POST["sauces"]) == $_POST["nbSaucesMax"])
                {
                    $commande->setSauce($_POST["sauces"]);
                    $commande->refresh();
                }
                else
                {
?>
<div>
    <p> ERREUR ! </p>
    <p> Vous n'avez pas saisi le bon nombre de sauces </p>
</div>
<?php
                }
            }

            echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
            
            break;

        case 'connexion':
            include_once 'Connexion/Connexion.php';
            include_once 'Connexion/ConnexionController.php';
            $instanceController = new ConnexionController();
            $instanceController->includeView();
            
            break;
        
        case 'inscription':
            include_once 'Inscription/Inscription.php';
            $inscrire = new insertUser();
            $inscrire->includeView();
            
            break;
        
        case "contact":
            include_once 'Contact/ContactController.php';
            $contact = new ContactController();
            $contact->includeView();
            
            break;
    }
    
}
else if (empty($_GET))
{
    ?>
<h class="bvn"> Bienvenue sur Tacos Of All Time  </h>
<form method="GET" action="Accueil.php">
    <input type="hidden" name="page" value="commander"/>
    <input type="submit" value="Commander"/>
</form>
    <?php
}
?>

<?php
include_once 'include/footer.php';