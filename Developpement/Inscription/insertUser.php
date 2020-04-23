<?php

    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];

    $testPseudo = true;
    foreach ($users as $user)
    {
        if ($pseudo == $user->getPseudo() || $mail == $user->getMail())
        {
            $testPseudo = false;
        }
    }
    
if ($testPseudo == true)
{
    $user = new User();
    $user->setPseudo($_POST['pseudo']);
    $user->setMail($_POST['mail']);
    $user->setMotDePasse($_POST['password']);
    $user->setDateNaissance($_POST['dateNaissance']);
    $user->setSexe($_POST['sexe']);
    $user->setBiographie($_POST['bio']);
    
    if ($_POST['sexe'] == "Homme")
    {
        $user->setCheminPhoto("UserImage/user.png");
    }
    else if ($_POST['sexe'] == "Femme")
    {
        $user->setCheminPhoto("UserImage/user-female.png");
    }
    else if ($_POST['sexe'] == "Hélicoptère d'attaque")
    {
        $user->setCheminPhoto("UserImage/attackHelico.jpg");
    }
    UsersManager::insertUser($user);
    header("Location: Connexion.php");
}
else if ($testPseudo == false)
{
    echo "<p>Ce nom d'utilisateur est deja pris. </p>";
    echo "<p> Vous allez être redirigé vers la page d'inscription dans 3 secondes. </p>";
    ?>
<META HTTP-EQUIV="Refresh" CONTENT="5; URL=Connexion.php">
    <?php
    header("Location: Inscription.php");
    exit;

}
