<?php require('gestionGroupesController.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mes groupes</title>

    <!-- Insertion lien utile -->
    <link rel="stylesheet" type="text/css" href="../../../web/css/accueil_gestionnaire.css" />
    <link rel="stylesheet" href="../design/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../design/css/ionicons/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<!-- En-tête -->
    <div class="header">
        <div id="logo">
            <img src="../../design/images/logo_nascop.png" alt="Logo Nascop" />
        </div>
        <nav>
            <ul>
                <li><a class="menu_effect" href="accueil_gestionnaire.html"> Accueil </a> </li>
                <li><a class="menu_effect" href="#"> Statistiques </a> </li>
                <li><a class="menu_effect" href="#"> Mes groupes </a> </li>
                <li><a class="menu_effect menu-right" href="#"> Nous contacter </a> </li>
                <li><a class="menu_effect btn-connect" href="#"> Mon profil </a> </li>
                <li><a class="menu_effect" href="#"> Langue </a> </li>
            </ul>
        </nav>
    </div>

    <div id="listGroupes">
         <?php                
            foreach($groups as $item) {
                
                echo '   
                    <div id="groupe_.'.$item->getId().'">
                        <h2>'.$item->getName().'</h2>';
                
                foreach(${'accommodations_'.$item->getId()} as $acc){
                    echo '
                        <div>'.$acc->getStreetNumber().' '.$acc->getStreet().' '.$acc->getCity().' '.$acc->getPostalCode().'</div>';        
                }
                echo '
                    </div>
                    <button id="modifier" onclick="modifierGroupe()">Modifier</button>
                    <button id="modifier" onclick="modifierGroupe()">Valider</button>
                    <button id="modifier" onclick="modifierGroupe()">Annuler</button>';
            }
        ?>
    </div>


    


</body>
</html>