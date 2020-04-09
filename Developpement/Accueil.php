<?php
include_once 'include/header.php';

if (!empty ($_GET))
{
    switch ($_GET['page'])
    {
        case 'commander':
            include_once 'Commande/CommandeController.php';
            break;
        case 'connexion':
            include_once 'Connexion/Connexion.php';
            break;
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