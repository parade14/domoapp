<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../../design/css/style_capteurs.css">
        <title>Mes capteurs</title>
    </head>

    <body>

        <div id="menu">

                <ul>

                    <li> <a class="menu_effect" href="#">Gestion température</a></li>
                    <li> <a class="menu_effect" href="#">Taux d'humidité</a></li>
                    <li> <a class="menu_effect" href="#">Gestion des lumières</a></li>
                    <li> <a class="menu_effect" href="#">Gestion des volets</a></li>
                    <li> <a class="menu_effect" href="#">Caméra Infrarouge</a></li>
                    <li> <a class="menu_effect" href="#">Détecteur Mouvement</a></li>
                    <li> <a class="menu_effect" href="#">Détecteur Fumée</a></li>
                    <li> <a class="menu_effect" href="#">Détecteur de CO2</a></li>

                </ul>
        </div>

        <div id="contenu">

            <h1>Température</h1>

            <fieldset>
                <legend class="titre">Appartement 1</legend>
                <p class="AdresseAppart"> <strong>Adresse:</strong> 15 rue des Guccigang</p>

                <div class="capteur">
                    <p class="piece">Chambre</p>
                    <i class="fa fa-thermometer-empty" aria-hidden="true"></i> <!-- Insertion d'un icone de font awesome-->
                    <p class="valeur">19°C</p>
                </div>

                <div class="capteur">
                    <p class="piece">Salon</p>
                    <i class="fa fa-thermometer-empty" aria-hidden="true"></i> <!-- Insertion d'un icone de font awesome-->
                    <p class="valeur">20°C</p>
                </div>




            </fieldset>


            <div id="capteurs">

                <!-- TODO : charger dynamiquement les blocs des capteurs  avec une boucle -->

                <div class="blocCapteur">
                    <div class="nomCapteur">Lampe</div> 
                    <img src="../../design/images/lampe.png">
                    <br>
                    <input type= "radio" name="onofflampe" value="on">ON
                    <input type= "radio" name="onofflampe" value="on">OFF
                </div>


                <div class="blocCapteur"> 
                    <div class="nomCapteur">Humidité</div>
                    <img src="../../design/images/humidite.png">
                    <div class="valeur">25%</div>
                </div>

                <div class="blocCapteur">
                    <div class="nomCapteur">Température</div>
                    <img src="../../design/images/thermo.png">
                    <div class="valeur">21°C</div>
                </div>

            </div>

        </div>



    

    </body>

</html>