<?php
/**
 * @var $user \Entities\User
 */
    $user;

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../web/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../web/css/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="../../web/css/user-home-style.css" />

        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script src="javascript/profile.js"></script>

        <title>User Home</title>
    </head>

    <body>

    <div class="profile hidden">
        <div class="profile-header">
            <h2 class="profile-header-text">Mon profil </h2>
            <i class="fa fa-times login-cross"></i>
        </div>
        <div class="profile-container">
            <p>TYPE : <?=$user->getProfileType()?></p>
            <p>NOM : <?=$user->getLastName()?></p>
            <p>PRENOM : <?=$user->getFirstName()?></p>
            <p>TELEPHONE : <?=$user->getPhone()?></p>
            <p>MAIL : <?=$user->getEmail()?></p>
        </div>

        <p class="modifier"><a href="ModifierProfil.html"> <input type="submit" value="Modifier"> </a></p>
    </div>



        <?php include(dirname(__FILE__).'/../headers/headerUserConnected.php');?>

        <section>
                <fieldset class="informations-wrapper">
                    <legend>Actualités</legend>
                    <ul class="informations-text">
                        <li>Système d'alarme désactivé</li>
                        <li>Nascop : nos offres évoluent, soutien de proximité avec notre nouveau chat</li>
                    </ul>
                </fieldset>

                <fieldset class="informations-wrapper">
                    <legend>Dernières consommations</legend>
                    <ul class="informations-text">
                        <li>Température moyenn de la maison : 18°C</li>
                        <li>Attention ! Température de la chambre : 20°C</li>
                    </ul>
                </fieldset>
        </section>


    </body>

</html>