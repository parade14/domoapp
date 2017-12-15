<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../design/css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../design/css/ionicons/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../design/css/user-home-style.css" />
        <link rel="stylesheet" href="../design/css/appartement-style.css" />
        <title>Titre</title>
    </head>

    <body>
        <div class="header">
            <div id="logo">
                <img src="../design/images/logo_nascop.png" alt="Logo Nascop" />
            </div>
            <nav>
                <ul>
                    <li><a class="menu_effect" href="#"> Accueil </a> </li>
                    <li><a class="menu_effect" href="#"> Statistiques </a> </li>
                    <li><a class="menu_effect" href="#"> Appartements </a> </li>
                    <li><a class="menu_effect" href="#"> Capteurs </a> </li>
                    <li><a class="menu_effect menu-right" href="#"> Nous contacter </a> </li>
                    <li><a class="menu_effect" href="#"> Mon profil </a> </li>
                    <li><a class="menu_effect" href="#"> Langue </a> </li>
                </ul>
            </nav>
        </div>

        <div id="conteneur" class="bckg">

            <div class="app row">
                <div class="panel column">
                    <div class="lists">
                        <ul class="nav column">
                            <li><div class="row show_hide"><i class="fa fa-home"></i>Appartement 1</div></li>
                        </ul>
                        <div class="line"></div>
                        <div class="add row"><i class="material-icons small">add_circle_outline</i>Add</div>
                    </div>
                </div>
            </div>

            <main>
                <article class="larg">
                    <div>
                        <h3>Appartement 1 <span class="entypo-down-open"></span></h3>

                        <div>
                            <form class="toggleDiv" action="" method="post">
                                <label>Adresse </label><input type="text" name="adresse" />
                                </br>
                                <label>Superficie </label><input type="text" name="superficie" />
                                </br>
                                <label>Nombre d'habitants </label><input type="text" name="nbHabitants" />
                                </br>
                                <input type="submit" value="Valider"/>
                            </form>
                        </div>

                    </div>
                </article>
            </main>

        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script src="../javascript/apartement.js"></script>
    </body>

</html>