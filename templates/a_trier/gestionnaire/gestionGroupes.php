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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">
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
                        <div>'.$acc->getStreetNumber().' '.$acc->getStreet().', '.$acc->getCity().', '.$acc->getPostalCode().'</div>';        
                }
                echo '
                    </div>
                    <button class="modifierGroupBtn" id="modifierGroup_'.$item->getId().'_Btn" onclick="modifierGroupe()">Modifier</button>
                    <button class="validerGroupBtn"id="validerGroup_'.$item->getId().'_Btn" onclick="validerGroupe()">Valider</button>
                    <button class="annulerGroupBtn"id="annulerGroup_'.$item->getId().'_Btn" onclick="annulerGroupe()">Annuler</button>
                    <button class="supprimerGroupBtn" id="supprimerGroup_'.$item->getId().'_Btn" onclick="supprimerGroupe()">Supprimer</button>';
            }
        ?>
        <br/><br/>
        <button id="creerGroup" onclick="creerGroupe()">Créer un groupe</button>
    </div>





<!------------------------------------------POPUP  CREATION -------------------------------------------------------- -->

<div id="dialog-form" title="Basic dialog" style="display:none">
    <form>
        <span>Nom du groupe : </span><input type="text"/>
        <br/>
        <ul id="listAppartAjoutes">
        </ul>
            
        </ul>
        <ul id="listAppartPopup">
            
        </ul>
    </form>
</div>

<!------------------------------------------POPUP  CREATION -------------------------------------------------------- -->
    


</body>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../../web/javascript/gestionGroupes.js"></script>
</html>