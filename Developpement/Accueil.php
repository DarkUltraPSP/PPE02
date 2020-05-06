<?php
include_once 'include/header.php';

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
                $_SESSION['size'] = $_POST["size"];
            }
            //session_destroy();
            print_r($_SESSION);
            
            break;

        case 'connexion':
            include_once 'Connexion/Connexion.php';
            include_once 'Connexion/ConnexionController.php';
            $instanceController = new ConnexionController();
            $instanceController->includeView();
            
            break;
        
        case 'inscription':
            include_once 'Inscription/Inscription.php';
            $inscrire = new InscriptionController();
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