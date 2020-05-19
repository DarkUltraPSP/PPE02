<?php
include_once 'include/header.php';

if (!empty ($_GET["destroy"]))
{
    if ($_GET["destroy"] == true)
    {
        session_destroy();
        header ("Location: Accueil.php");
        exit;
    }
}

if (!empty ($_GET['page']))
{
    
    switch ($_GET['page'])
    {
        case 'commander':
            include_once 'Pages/Commande/CommandeController.php';
            $commande = new CommandeController();
            $commande->includeView();
            if (!empty($_POST["size"])) //Mettre la taille du Tacos en session
            {
                $commande->size($_POST["size"]);
                $commande->refreshTacos();
            }
            if (!empty($_POST["viandes"])) //Mettre les viandes en session
            {
                if (count($_POST["viandes"]) == $_SESSION["size"])
                {
                    $commande->setViandes($_POST["viandes"]);
                    $commande->refreshTacos();
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
            if (!empty($_POST["retourSize"])) //Unset size pour revenir a la page des tailles
            {
                unset($_SESSION["size"]);
                $commande->refreshTacos();
            }
            if (!empty($_POST["sauces"])) //Mettre les sauces en session
            {
                if (count($_POST["sauces"]) == $_POST["nbSaucesMax"])
                {
                    $commande->setSauce($_POST["sauces"]);
                    $commande->refreshTacos();
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
            if (!empty($_POST["retourViande"])) //Unset viande0,1,2 pour revenir a la page des viandes
            {
                unset($_SESSION["viande0"]);
                
                if (!empty($_SESSION["viande1"]))
                {
                    unset($_SESSION["viande1"]);
                    
                    if (!empty($_SESSION["viande2"]))
                    {
                        unset($_SESSION["viande2"]);
                    }
                }
                $commande->refreshTacos();
            }
            if (!empty($_POST["confirmationTacos"])) //Mettre le tacos en tableau d'objet
            {
                $tacos = new Tacos();
                switch ($_SESSION["size"])
                {
                    case 1:
                        $commande->setTacosMObjet($_SESSION["size"], $_SESSION["viande0"], $_SESSION["sauce0"]);
                        break;
                    case 2:
                        $commande->setTacosLObjet($_SESSION["size"], $_SESSION["viande0"], $_SESSION["viande1"], $_SESSION["sauce0"], $_SESSION["sauce1"]);
                        break;
                    case 3:
                        $commande->setTacosXLObjet($_SESSION["size"], $_SESSION["viande0"], $_SESSION["viande1"], $_SESSION["viande2"], $_SESSION["sauce0"], $_SESSION["sauce1"]);
                        break;
                    default:
                        break;
                }
                $commande->unsetSessionTacos();
            }
            if (!empty($_POST["retourSauce"]))
            {
                echo "test";
                unset($_SESSION["sauce0"]);
                if (!empty($_SESSION["sauce1"]))
                {
                    unset($_SESSION["sauce1"]);
                }
                $commande->refreshTacos();
            }
            if (!empty($_POST["delTacos"])) //Unset tout le tacos pour revenir a la page produit
            {
                $commande->unsetSessionTacos();
            }
            

            if (!empty($_POST["idFrites"])) //Met le type de frites choisis en session
            {
                $commande->setFrites($_POST["idFrites"]);
                $commande->refreshFrites();
            }
            if (!empty($_POST["quantiteFrites"])) //Met la quantite de frites en session
            {
                $commande->setQuantiteFrites($_POST["quantiteFrites"]);
                $commande->refreshFrites();
            }
            if (!empty($_POST["confirmationFrites"])) //Met les frites en tableau d'objet
            {
                $commande->setFritesObjet($_SESSION["idFrites"], $_SESSION["quantiteFrites"]);
                $commande->unsetSessionFrites();
            }
            else if (!empty($_POST["delFrites"]))  //Unset tout les frites pour revenir a la page produit
            {
                $commande->unsetSessionFrites();
            }
            
            
            if (!empty($_POST["idBoisson"])) //Ajout de la boisson en session
            {
                $commande->setBoisson($_POST["idBoisson"]);
                $commande->refreshBoisson();
            }
            
            if (!empty($_POST["quantiteBoisson"])) //Ajout de la quantite en session
            {
                $commande->setQuantiteBoisson($_POST["quantiteBoisson"]);
                $commande->refreshBoisson();

            }
            
            if (!empty($_POST["confirmationBoisson"])) //Met la boisson en session
            {
                $commande->setBoissonObjet($_SESSION["idBoisson"], $_SESSION["quantiteBoisson"]);
                $commande->unsetSessionBoisson();
            }
            else if(!empty ($_POST["delBoisson"])) //Unset tout les boissons pour revenir a la page produit
            {
                $commande->unsetSessionBoisson();
            }
            
            echo "<pre>";
            print_r($_SESSION);
            print_r($_POST);
            echo "</pre>";
            
            break;
            
        case "panier":
            include_once 'Pages/Panier/PanierController.php';
            $panier = new PanierController;
            $panier->includeView();
            if (!empty ($_POST["delTacosPanier"]))
            {
                $panier->removeTacos($_POST["arrayPosTacos"]);
                $panier->refreshPanier();
            }
            if (!empty($_POST["delFritesPanier"]))
            {
                $panier->removeFrites($_POST["arrayPosFrites"]);
                $panier->refreshPanier();
            }
            
            if (!empty($_POST["delBoissonPanier"]))
            {
                $panier->removeBoisson($_POST["arrayPosBoisson"]);
                $panier->refreshPanier();
            }
            
            echo "<pre>";
            print_r($_SESSION);
            print_r($_POST);
            echo "</pre>";
            break;
            
        case "InfoClient": 
            include_once 'Pages/InfoClient/InfoClientController.php';
            $infoClient = new InfoClientController();
            $infoClient->includeView();
            
            if (!empty($_POST["envoieCommande"]))
            {
                $infoClient->insertClient($_POST["nom"], $_POST["prenom"], $_POST["adresse"]);
            }
            
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
            include_once 'Pages/Contact/ContactController.php';
            $contact = new ContactController();
            $contact->includeView();
            
            break;
    }
    
}
else
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