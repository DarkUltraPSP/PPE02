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
    }
}
else if (empty($_GET))
{
    ?>
<h class="bvn"> Bienvenue sur Tacos Of All Time  </h>
    <?php
}
?>

<?php
include_once 'include/footer.php';