<?php require('gestionGroupesController.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mes groupes</title>

    <!-- Insertion lien utile -->
    <link rel="stylesheet" type="text/css" href="../../../web/css/gestionGroupes.css" />
    <link rel="stylesheet" href="../design/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../design/css/ionicons/css/ionicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<!-- En-tête -->
    <?php include '../../headers/headerGestConnected.php';?>
 <!-- --------------------------------------------------------------------------------------------------------------------->


    <div id="listGroupes">
         <?php                
            foreach($groups as $item) {
                
                echo '   
                    <div class="divGroupe" id="groupe_.'.$item->getId().'">
                        <h2>'.$item->getName().'</h2>';
                
                foreach(${'accommodations_'.$item->getId()} as $acc){
                    echo '
                        <div>'.$acc->getStreetNumber().' '.$acc->getStreet().', '.$acc->getCity().', '.$acc->getPostalCode().'</div>';        
                }
                echo '
                    </div>
                    <div class="divButtons"> 
                        <button class="modifierGroupBtn" id="modifierGroup_'.$item->getId().'_Btn" onclick="modifierGroupe()">Modifier</button>
                        <button class="validerGroupBtn"id="validerGroup_'.$item->getId().'_Btn" onclick="validerGroupe()">Valider</button>
                        <button class="annulerGroupBtn"id="annulerGroup_'.$item->getId().'_Btn" onclick="annulerGroupe()">Annuler</button>
                        <button class="supprimerGroupBtn" id="supprimerGroup_'.$item->getId().'_Btn" onclick="supprimerGroupe('.$item->getId().')">Supprimer</button>
                    </div>';
            }
        ?>
        <br/><br/>
        <div class="divButtons">
            <button id="creerGroup" onclick="creerGroupe()">Créer un groupe</button>
        </div>
    </div>
   





<!------------------------------------------POPUP  CREATION -------------------------------------------------------- -->

<div id="dialog-form" title="Créer un groupe" style="display:none">
    <form id="formCreationGroupe">
        <span>Nom du groupe : </span><input name="nomGroupe" id="nomGroupe" type="text"/>
        <br/>            
        </ul>
        <ul id="listAppartPopup">
            
        </ul>
    </form>
</div>

<!------------------------------------------POPUP  SUPPRESSION -------------------------------------------------------- -->
<div id="dialogSupp" style="display:none" title="Supprimer un groupe">
    Confirmer la suppression ?
</div>


</body>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../../web/javascript/gestionGroupes.js"></script>
</html>