<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../design/css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../design/css/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="../../design/css/user-home-style.css" />
        <title>User Home</title>
    </head>

    <body>

    <div class="profile hidden">
        <div class="profile-header">
            <h2 class="profile-header-text">Mon profil </h2>
            <i class="fa fa-times login-cross"></i>
        </div>
        <div class="profile-container">
            <p>Nom : Durant</p>
            <p>Prénom : Alphonse</p>
            <p>Téléphone : 01 62 52 98 15</p>
            <p>Mail : alphonse.durant@gmail.com</p>
        </div>

        <p class="modifier">Modifier mon profil</p>
    </div>



        <div class="header">
            <div id="logo">
                <img src="../../design/images/logo_nascop.png" alt="Logo Nascop" />
            </div>
            <nav>
                <ul>
                    <li><a class="menu_effect" href="#"> Accueil </a> </li>
                    <li><a class="menu_effect" href="#"> Statistiques </a> </li>
                    <li><a class="menu_effect" href="modifierAppartement.php"> Appartements </a> </li>
                    <li><a class="menu_effect" href="capteurs.php"> Capteurs </a> </li>
                    <li><a class="menu_effect menu-right" href="#"> Nous contacter </a> </li>
                    <li><a class="menu_effect" href="#"> Mon profil </a> </li>
                    <li><a class="menu_effect" href="#"> Langue </a> </li>
                </ul>
            </nav>
        </div>

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
                        <li>Température moyennde la maison : 18°C</li>
                        <li>Attention ! Température de la chambre : 20°C</li>
                    </ul>
                </fieldset>
        </section>


    </body>

</html>