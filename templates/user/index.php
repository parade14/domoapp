<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="../css/user-home-style.css" />

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
            <p>TYPE : Gestionnaire</p>
            <p>NOM : Durant</p>
            <p>PRENOM : Alphonse</p>
            <p>TELEPHONE : 01 62 52 98 15</p>
            <p>MAIL : alphonse.durant@gmail.com</p>
        </div>

        <p class="modifier"><a href="ModifierProfil.html"> <input type="submit" value="Modifier"> </a></p>
    </div>



        <div class="header">
            <div id="logo">
                <img src="../images/logo_nascop.png" alt="Logo Nascop" />
            </div>
            <nav>
                <ul>
                    <li><a class="menu_effect" href="#"> Accueil </a> </li>
                    <li><a class="menu_effect" href="#"> Statistiques </a> </li>
                    <li><a class="menu_effect" href="modifierAppartement.php"> Appartements </a> </li>
                    <li><a class="menu_effect" href="capteurs.php"> Capteurs </a> </li>
                    <li><a class="menu_effect menu-right" href="#"> Nous contacter </a> </li>
                    <li><a class="menu_effect btn-connect" href="#"> Mon profil </a> </li>
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
                        <li>Température moyenn de la maison : 18°C</li>
                        <li>Attention ! Température de la chambre : 20°C</li>
                    </ul>
                </fieldset>
        </section>


    </body>

</html>