<!DOCTYPE html>
<?php
    require 'appartementController.php';
?>

    <html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../design/css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../design/css/ionicons/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../../design/css/user-home-style.css" />
        <link rel="stylesheet" href="../../design/css/appartement-style.css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <title>Titre</title>
    </head>

    <body>
        <div class="header">
            <div id="logo">
                <img src="../../design/images/logo_nascop.png" alt="Logo Nascop" />
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
                        <ul class="nav column">
                            <li><div class="row show_hide"><i class="fa fa-home"></i>Mes Appartements</div></li>
                        </ul>
                        <div class="line"></div>
                        <div class="appartment-list">
                        <?php    
                            foreach($accomodations as $item) {
                            echo '
                            <h3 class="appartment form_'.$item->getId().'"> 
                                <span> Appartement '.$item->getId().' </span>
                            </h3>';
                            }?>
                        </div>
                        <div class="add row"><i class="material-icons small">add_circle_outline</i>Ajouter</div>
                </div>
            </div>

            <main>
                <div class="larg" id="containerAccommodations">
                    <?php    
                    foreach($accomodations as $item) {
                    echo '
                    <div class="larg-w form_'.$item->getId().'">
                    
                        <div class="angle-wrap">
                            <h3>Appartement '.$item->getId().' </h3>
                            <i class="fa fa-angle-left form_'.$item->getId().'"></i>
                        </div>

                            <form class="toggleDiv form_'.$item->getId().'" action="insertAppartement.php" method="POST">
                                
                               <input type="hidden" name="id" value="'.$item->getId().'">
                                
                                <div class="input">
                                    <label>Adresse </label>
                                    <input class="text-field" type="text" name="adresse" value="'.$item->getStreetNumber().' '.$item->getStreet().'" />
                                </div>

                                <div class="input">
                                    <label>Superficie </label>
                                    <input class="text-field" type="text" name="superficie" value="'.$item->getArea().'"  />
                                </div>

                                <div class="input">
                                    <label>Nombre d\'habitants </label>
                                    <input class="text-field" type="text" name="nbHabitants" value="'.$item->getInhabitantNumber().'" />
                                </div>

                                <input type="submit" class="submit" value="Valider"/>
                            </form>
                        <div id="dinamic-fields"></div>
                    </div>';
                    }?> 
                </div>
            </main>

        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script src="../../javascript/apartement.js"></script>
    </body>

</html>